<?php

namespace popp\ch06\batch03;

use JetBrains\PhpStorm\NoReturn;

class Runner
{
    public static function run(): void
    {
        /* listing 06.07 */
        $test = ParamHandler::getInstance(__DIR__ . "/params.xml");
        $test->addParam('key1', 'val1');
        $test->addParam('key2', 'val2');
        $test->addParam('key3', 'val3');
        $test->write();   // writing in XML format
    }

    #[NoReturn] public static function run2(): void
    {
        /* listing 06.08 */
        $test = ParamHandler::getInstance(__DIR__ . "/params.txt");
        $test->read();   // reading in text format
        $params = $test->getAllParams();
        print_r($params);
    }
}