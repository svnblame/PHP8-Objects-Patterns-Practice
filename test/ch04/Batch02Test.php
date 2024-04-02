<?php declare(strict_types=1);

namespace popp\test\ch04;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;
use popp\ch04\batch02\DbGenerate;
use popp\ch04\batch02\ShopProduct;

class Batch02Test extends BaseUnit 
{
    public function testProduct1() {
        $dbgen = new DbGenerate();
        $pdo = $dbgen->getPDO();

        $obj = ShopProduct::getInstance(1, $pdo);
        self::assertEquals($obj->getProducerFirstName(), "willa");
    }
}
