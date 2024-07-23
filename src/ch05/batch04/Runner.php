<?php declare(strict_types=1);

namespace popp\ch05\batch04;

use popp\ch05\batch04\util\InSame;
use popp\ch05\batch04\client\FromClient;

class Runner
{
    /* listing 05.19 */

    public static function runbefore(): void
    {
        /* listing 05.09 */
        \popp\ch05\batch04\Debug::helloWorld();
    }

    public static function run(): void
    {
        InSame::run();
    }

    public static function run2(): void
    {
        FromClient::run();
    }

    public static function run3(): void
    {
        util\Debug::helloWorld();
    }
}