<?php

namespace popp\ch06\batch01;

require_once __DIR__ . '/ParamReader.php';
class Runner
{
    public static function run()
    {
        /* listing 06.02 */
        $file = '/tmp/params.txt';
        $params = [
            'key1' => 'val1',
            'key2' => 'val2',
            'key3' => 'val3',
        ];
        writeParams($params, $file);
        $output = readParams($file);
        print_r($output);
    }
}