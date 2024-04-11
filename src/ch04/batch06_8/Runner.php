<?php declare(strict_types=1);

namespace popp\ch04\batch06_8;

class Runner 
{
    public static function run()
    {
        $u = new UtilityService();
        print $u->calculateTax(100) . "\n";
    }
}