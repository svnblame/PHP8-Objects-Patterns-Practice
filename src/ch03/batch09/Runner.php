<?php

namespace popp\ch03\batch09;

use popp\ch03\batch09\ShopProduct;
use popp\ch03\batch09\AddressManager;

class Runner
{
    public static function run1()
    {
        /* listing 03.34, page 43 */
        // will fail
        $product = new ShopProduct("title", "first", "main", []);
    }

    public static function run2()
    {
        /* listing 03.35, page 44 */
        $product = new ShopProduct("title", "first", "main", "4.22");

        print $product->getPrice();
    }

    public static function run3()
    {
        $manager = new AddressManager();

        /* listing 03.37, page 44 */
        $manager->outputAddresses("false");
    }
}
