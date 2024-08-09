<?php

namespace popp\ch06\batch03;

class Runner
{
    public static function run()
    {
        /* listing 06.07 */
        $test = ParamHandler::getInstance(__DIR__ . "/params.xml");
        $test->addParam('key1', 'val1');
        $test->addParam('key2', 'val2');
        $test->addParam('key3', 'val3');
        $test->write();   // writing in XML format
    }
}