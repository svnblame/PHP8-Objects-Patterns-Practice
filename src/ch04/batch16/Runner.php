<?php declare(strict_types=1);

namespace popp\ch04\batch16;

class Runner 
{
    public static function run()
    {
        $address = new Address("441b Bakers Street");
        print "street address: {$address->streetaddress}\n";
        $address = new Address("15", "Albert Mews");
        print "street address: {$address->streetaddress}\n";
        $address->streetaddress = "34, West 24th Avenue";
        print "street address: {$address->streetaddress}\n";   
    }

    public static function run2()
    {
        /* listing 04.93, page 134 */
        /* Working with Interceptors (aka overloading, magic methods) */
        $address = new Address("441b Bakers Street");
        print_r($address);
    }
}