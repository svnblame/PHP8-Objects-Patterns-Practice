<?php declare(strict_types=1);

namespace popp\ch04\batch03;

use popp\ch04\batch02\ShopProduct;
use popp\ch04\batch02\BookProduct;
use popp\ch04\batch02\CdProduct;

class Runner 
{
    public static function run2() 
    {
        // demonstrate abstract instantiation error
        /* listing 04.10, page 86 */
        $writer = new ShopProductWriter();
    }
}
