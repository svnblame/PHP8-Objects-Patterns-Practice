<?php declare(strict_types=1);

namespace popp\ch04\batch06_3;

class Runner 
{
    public static function run()
    {
        $p = new ShopProduct();
        $ret = self::storeIdentityObject($p);
        print $ret->calculateTax(100) . "\n";
        print $ret->generateId() . "\n";
    }

    public static function run2()
    {
        $u = new UtilityService();
        print $u->calculateTax(100);
    }

    /* listing 04.34, page 97 */
    public static function storeIdentityObject(IdentityObject $idobj)
    {
        // do something with the IdentityObject

        return $idobj;
    }
}
