<?php declare(strict_types=1);

namespace popp\ch04\batch06_9;

class Runner 
{
    public static function run()
    {
        /* listing 04.48, page 104 */
        /* Chanaging access rights to trait methods */
        $u = new UtilityService(100);
        print $u->calculateTax() . "\n";
    }

    public static function run2()
    {
        $u = new UtilityService(100);
        print $u->getFinalPrice() . "\n";
    }
}