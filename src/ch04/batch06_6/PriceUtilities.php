<?php declare(strict_types=1);

namespace popp\ch04\batch06_6;

/* listing 04.40, page 100 */
/* Using static methods in traits */
trait PriceUtilities
{
    private static int $taxrate = 20;

    public static function calculateTax(float $price): float 
    {
        return ((self::$taxrate / 100) * $price);
    }

    // other utiliites ...
}