<?php declare(strict_types=1);

namespace popp\ch05\batch08;

/* listing 05.80 */

use Exception;
use ReflectionClass;
use ReflectionMethod;

class ModuleRunner
{
    private array $configData = [
        PersonModule::class => ['person' => 'bob'],
        FtpModule::class    => [
            'host' => 'example.com',
            'user' => 'anon'
        ]
    ];

    /**
     * @var array
     */
    private array $modules = [];

    /* listing 05.80 & listing 05.81 */
    /**
     * @throws \ReflectionException
     * @throws Exception
     */
    public function init(): void
    {
        $interface = new ReflectionClass(Module::class);

        foreach ($this->configData as $moduleName => $params) {
            $moduleClass = new ReflectionClass($moduleName);

            if (! $moduleClass->isSubclassOf($interface)) {
                throw new Exception("Unknown module type: '{$moduleName}'.");
            }

            $module = $moduleClass->newInstance();

            foreach ($moduleClass->getMethods() as $method) {
                $this->handleMethod($module, $method, $params);
            }

            $this->modules[] = $module;
        }
    }

    /* listing 05.83 */
    /**
     * @throws \ReflectionException
     */
    public function handleMethod(Module $module, ReflectionMethod $method, array $params): bool
    {
        $name = $method->getName();
        $args = $method->getParameters();

        if (count($args) != 1 || !str_starts_with($name, 'set')) {
            return false;
        }

        $property = strtolower(substr($name, 3));

        if (! isset($params[$property])) {
            return false;
        }

        if (! $args[0]->hasType()) {
            $method->invoke($module, $params[$property]);
            return true;
        }

        $argType = $args[0]->getType();

        if (! ($argType instanceof \ReflectionUnionType) && class_exists($argType->getName())) {
            $method->invoke(
                $module,
                (new ReflectionClass($argType->getName()))->newInstance($params[$property]),
            );
        } else {
            $method->invoke($module, $params[$property]);
        }

        return true;
    }
}
