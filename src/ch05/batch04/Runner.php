<?php declare(strict_types=1);

namespace popp\ch05\batch04;

use popp\ch05\batch04\util\InSame;

class Runner
{
    /* listing 05.19 */

    public static function runbefore(): void
    {
        /* listing 05.09 */
        \popp\ch05\batch04\Debug::helloWorld();
    }

    public static function run()
    {
        InSame::run();
    }
}