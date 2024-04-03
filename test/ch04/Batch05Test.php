<?php declare(strict_types=1);

namespace popp\ch04;

use popp\test\BaseUnit;
use popp\ch04\batch05\Runner;
use popp\ch04\batch02\CdProduct;
use popp\ch04\batch05\ShopProduct as LocalShopProduct;

require_once("vendor/autoload.php");

class Batch05Test extends BaseUnit 
{
    public function testPrice() 
    {
        $price = Runner::run();
        self::assertEquals($price, "12.22");
    }
}

