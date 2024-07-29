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

    public static function run3()
    {
        /* listing 05.62 */
        $cd = new CdProduct('cd1', 'bob', 'bobbleson', 4, 50);
        var_dump($cd);
    }
}