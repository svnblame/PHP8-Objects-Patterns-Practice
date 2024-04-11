<?php declare(strict_types=1);

namespace popp\ch04\batch06_6;

class Runner 
{
    public static function run() 
    {
        /* listing 04.42, page 101 */
        /* Using static methods in traits */
        print UtilityService::calculateTax(100) . "\n";
    }
}