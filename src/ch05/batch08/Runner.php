<?php declare(strict_types=1);

namespace popp\ch05\batch08;

class Runner
{
    /**
     * @throws \ReflectionException
     */
    public static function run()
    {
        /* listing 05.82 */
        $test = new ModuleRunner();

        $test->init();
    }
}