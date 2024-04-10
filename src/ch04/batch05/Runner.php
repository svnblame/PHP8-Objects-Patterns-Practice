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

    public static function run2()
    {
        $consultancy = new Consultancy();
        print $consultancy->getPrice();
    }

    /* listing 04.17, page 90 */
    public function cdInfo(CdProduct $prod): int 
    {
        // we know we can call getPlayLength()
        $length = $prod->getPlayLength();

        return $length;
    }

    public function addChargeableItem(Chargeable $item)
    {
        // all we know about $item is that it
        // is a Chargeable object -- the fact that it
        // is also a CdProduct is irrelevant.
        // We can only be sure of getPrice() method being available
        // ...
        /* listing 04.19 */
        return $item->getPrice();
    }
}
