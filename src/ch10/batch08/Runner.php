<?php declare(strict_types=1);

namespace popp\ch10\batch08;

require_once __DIR__ . '/../../../src/ch10/batch08/legacy.php';

class Runner {
    public static function run(): void
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

    public static function run2(): void
    {
        /* listing 10.41 */
        $facade = new ProductFacade(__DIR__ . '/test2.txt');
        $object = $facade->getProduct('234');
    }
}
