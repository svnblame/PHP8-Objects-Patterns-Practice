<?php declare(strict_types=1);

namespace popp\ch04\batch05;

use popp\ch04\batch02\CdProduct;
use popp\ch04\batch02\ShopProduct;
use popp\ch04\batch05\ShopProduct as LocalShopProduct;

class Runner 
{
    public static function run() 
    {
        $product = new LocalShopProduct(12.22);
        return $product->getPrice();
    }
}