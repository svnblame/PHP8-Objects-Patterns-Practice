<?php declare(strict_types=1);

namespace popp\ch05\batch07;

use popp\ch04\batch02\BookProduct;
use popp\ch04\batch02\CdProduct;

class Runner
{
    public static function run2()
    {
        /* listing 05.61 & 05.63 */
        $productClass = new \ReflectionClass(CdProduct::class);
        print $productClass;
    }
}