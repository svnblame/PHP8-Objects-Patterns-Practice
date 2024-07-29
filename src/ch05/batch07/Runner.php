<?php declare(strict_types=1);

namespace popp\ch05\batch07;

use popp\ch04\batch02\BookProduct;
use popp\ch04\batch02\CdProduct;

class Runner
{
    public static function run2(): void
    {
        /* listing 05.61 & 05.63 */
        $productClass = new \ReflectionClass(CdProduct::class);
        print $productClass;
    }

    public static function run3(): void
    {
        /* listing 05.62 */
        $cd = new CdProduct('cd1', 'bob', 'bobbleson', 4, 50);
        var_dump($cd);
    }

    public static function run4(): void
    {
        /* listing 05.65 */
        $productClass = new \ReflectionClass(CdProduct::class);
        print ClassInfo::getData($productClass);
    }

    public static function run5(): void
    {
        /* listing 05.67 */
        print ReflectionUtil::getClassSource(
            new \ReflectionClass(CdProduct::class)
        );
    }

    public static function run6(): void
    {
        /* listing 05.69 */
        $productClass = new \ReflectionClass(CdProduct::class);
        $methods = $productClass->getMethods();

        foreach ($methods as $method) {
            print ClassInfo::methodData($method);
            print "\n----\n";
        }
    }

    public static function run7(): void
    {
        /* listing 05.72 */
        $class  = new \ReflectionClass(CdProduct::class);
        $method = $class->getMethod('getSummaryLine');
        print ReflectionUtil::getMethodSource($method);
    }
}