<?php declare(strict_types=1);

namespace popp\ch10\batch08;

require_once __DIR__ . '/../../../src/ch10/batch08/legacy.php';

class Runner {
    public static function run()
    {
        /* listing 10.39 */
        $lines = getProductFileLines(__DIR__ . '/test2.txt');
        $objects = [];

        foreach ($lines as $line) {
            $id = getIDFromLine($line);
            $name = getNameFromLine($line);
            $objects[$id] = getProductObjectFromID($id, $name);
        }

        print_r($objects);
    }
}
