<?php

namespace popp\ch03\batch08;

use popp\ch03\batch04\ShopProduct;

class ShopProductWriter
{
    /* listing 03.30 */
    public function write(ShopProduct $shopProduct)
    {
        print "{$shopProduct->title}: " .
            $shopProduct->getProducer() .
            " ({$shopProduct->price})\n";
    }
}
