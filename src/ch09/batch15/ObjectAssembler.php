<?php

declare(strict_types=1);

namespace popp\ch09\batch15;

/* listing 09.72 */
/* listing 09.65 */
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
            foreach ($class->arg as $arg) {
                $argClass = (string)$arg['inst'];
                $args[(int)$arg['num']] = $argClass;
            }
            if (isset($class->instance)) {
                if (isset($class->instance[0]['inst'])) {
                    $resolvedName = (string)$class->instance[0]['inst'];
                }
            }
            ksort($args);
            $this->components[$name] = function () use ($resolvedName, $args) {
                $expandedArgs = [];
                foreach ($args as $arg) {
                    $expandedArgs[] = $this->getComponent($arg);
                }
                $rClass = new \ReflectionClass($resolvedName);
                return $rClass->newInstanceArgs($expandedArgs);
            };
        }
    }

    /* listing 09.70 */
    public function getComponent(string $class): object
    {
        // create $inst -- our object instance
        // and a list of \ReflectionMethod objects

        /* /listing 09.70 */
        if (isset($this->components[$class])) {
            // instance found in config
            $inst = $this->components[$class]();
            $rClass = new \ReflectionClass($inst::class);
            $methods = $rClass->getMethods();
        } else {
            /* listing 09.66 */

            $rClass = new \ReflectionClass($class);
            $methods = $rClass->getMethods();
            $injectConstructor = null;
            foreach ($methods as $method) {
                foreach ($method->getAttributes(InjectConstructor::class) as $attribute) {
                    $injectConstructor = $attribute;
                    break;
                }
            }
            if (is_null($injectConstructor)) {
                $inst = $rClass->newInstance();
            } else {
                $constructorargs = [];
                foreach ($injectConstructor->getArguments() as $arg) {
                    $constructorargs[] = $this->getComponent($arg);
                }
                $inst = $rClass->newInstanceArgs($constructorargs);
            }
            /* /listing 09.66 */
        }

        /* listing 09.70 */
        /* /listing 09.65 */
        $this->injectMethods($inst, $methods);
        /* listing 09.65 */
        return $inst;
    }

    /* /listing 09.65 */
    public function injectMethods(object $inst, array $methods)
    {
        foreach ($methods as $method) {
            foreach ($method->getAttributes(Inject::class) as $attribute) {
                $args = [];
                foreach ($attribute->getArguments() as $argstring) {
                    $args[] = $this->getComponent($argstring);
                }
                $method->invokeArgs($inst, $args);
            }
        }
    }
    /* listing 09.65 */
    /* /listing 09.70 */
}
/* /listing 09.65 */