<?php

declare(strict_types=1);

namespace popp\ch09\batch14;

/* listing 09.58 */
class ObjectAssembler
{
    private array $components = [];

    public function __construct(string $conf)
    {
        $this->configure($conf);
    }

    private function configure(string $conf): void
    {
        $data = simplexml_load_file($conf);
        foreach ($data->class as $class) {
            $args = [];
            $name = (string)$class['name'];
            $resolvedName = $name;
            /* listing 09.59 */
            foreach ($class->arg as $arg) {
                $argClass = (string)$arg['inst'];
                $args[(int)$arg['num']] = $argClass;
            }
            /* listing 09.59 */
            if (isset($class->instance)) {
                if (isset($class->instance[0]['inst'])) {
                    $resolvedName = (string)$class->instance[0]['inst'];
                }
            }
            /* listing 09.60 */
            ksort($args);
            $this->components[$name] = function () use ($resolvedName, $args) {
                $expandedargs = [];
                foreach ($args as $arg) {
                    $expandedargs[] = $this->getComponent($arg);
                }
                $rClass = new \ReflectionClass($resolvedName);
                return $rClass->newInstanceArgs($expandedargs);
            };
            /* /listing 09.60 */
        }
    }

    public function getComponent(string $class): object
    {
        if (isset($this->components[$class])) {
            $inst = $this->components[$class]();
        } else {
            $rClass = new \ReflectionClass($class);
            $inst = $rClass->newInstance();
        }
        return $inst;
    }
}
