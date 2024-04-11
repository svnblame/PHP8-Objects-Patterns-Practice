<?php declare(strict_types=1);

namespace popp\ch04\batch06;

class Runner
{
    public static function run() 
    {
        print_r(Document::create());
    }

    public static function run2()
    {
        $p = new ShopProduct("Fine Soap", "", "Bob's Bathroom", 1.33);
        print $p->calculateTax(100) . "\n";
    }
}
