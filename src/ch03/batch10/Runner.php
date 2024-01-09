<?php

/* listing 03.38, page 44 */
declare(strict_types=1);

namespace popp\ch03\batch10;

use popp\ch03\batch09\AddressManager;
use popp\ch03\batch09\ShopProduct;

class Runner
{
    public static function run1()
    {
        $manager = new AddressManager();

        $manager->outputAddresses("false");
    }

    public static function run2()
    {
        /* listing 03.51, page 52 */
        $product1 = new ShopProduct("My Antonia", "Willa", "Cather", 5.99);
        $product2 = new ShopProduct(
            "Exile on Coldharbour Lane",
            "The",
            "Alabama 3",
            10.99
        );

        print "author: " . $product1->getProducer() . "\n";
        print "artist: " . $product2->getProducer() . "\n";
    }
}
