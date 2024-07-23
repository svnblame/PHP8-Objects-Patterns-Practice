<?php declare(strict_types=1);

namespace popp\ch05\batch04;

use popp\ch05\batch04\util\InSame;
use popp\ch05\batch04\client\FromClient;
use popp\ch05\batch04\util\Debug;
use popp\ch05\batch04\Debug as CoreDebug;

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

    public static function run4(): void
    {
        /* listing 05.08 */
        Debug::helloWorld();
    }

    public static function run5(): void
    {
        CoreDebug::helloWorld();
    }

    public static function run8(): void
    {
        require_once(__DIR__ . '/Autoload.php');
    }

    public static function run9(): void
    {
        require_once(__DIR__ . '/Autoload2.php');
    }

    public static function run10(): void
    {
        $here = getcwd();
        chdir(__DIR__);

        require_once(__DIR__ . '/Autoload3.php');

        chdir($here);
    }

    public static function run10_2(): void
    {
        $path = get_include_path();
        set_include_path("{$path}:" . __DIR__);
        require_once(__DIR__ . '/Autoload3_1.php');

        set_include_path($path);
    }
}