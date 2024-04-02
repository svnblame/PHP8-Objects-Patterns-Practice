<?php declare(strict_types=1);

namespace popp\ch04\batch02;

class Runner 
{
    public static function run() 
    {
        $dbgen = new DbGenerate();
        $pdo = $dbgen->getPDO();

        $obj = ShopProduct::getInstance(1, $pdo);
        print_r($obj);
        $obj = ShopProduct::getInstance(2, $pdo);
        print_r($obj);
        $obj = ShopProduct::getInstance(3, $pdo);
        print_r($pdo);
    }

    public static function run2() 
    {
        $dsn = "sqlite:/usr/local/var/db/sqlite/products.sqlite3";
        $pdo = new \PDO($dsn, null, null);
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $obj = ShopProduct::getInstance(1, $pdo);

        /* listing 04.06, page 84 */
        print $obj->getProducerFirstName();
    }

    public static function run3() 
    {
        /* listing 04.08, page 85 */
        print ShopProduct::AVAILABLE;
    }
}
