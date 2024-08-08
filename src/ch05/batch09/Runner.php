<?php declare(strict_types=1);

namespace popp\ch05\batch09;

use JetBrains\PhpStorm\NoReturn;
use ReflectionAttribute;
use ReflectionClass;
use ReflectionMethod;

class Runner
{
    public static function runClass(): void
    {
        /* listing 05.85 */
        $rpers = new ReflectionClass(Person::class);

        $attrs = $rpers->getAttributes();

        foreach ($attrs as $attr) {
            print $attr->getName() . "\n";
        }
    }

    public static function runMethod1(): void
    {
        /* listing 05.87 */
        $rpers = new ReflectionClass(Person::class);
        $rmeth = $rpers->getMethod('setName');
        $attrs = $rmeth->getAttributes();
        foreach ($attrs as $attr) {
            print $attr->getName() . "\n";
        }
    }

    public static function runMethod2(): void
    {
        /* listing 05.89 */
        $rpers = new ReflectionClass(Person::class);
        $rmeth = $rpers->getMethod('setInfo');
        $attrs = $rmeth->getAttributes();
        foreach ($attrs as $attr) {
            print $attr->getName() . "\n";
            foreach ($attr->getArguments() as $arg) {
                print "  - $arg\n";
            }
        }
    }

    /**
     * @return void
     */
    #[NoReturn] public static function runMethod3(): void
    {
        /* listing 05.91 */
        $rpers = new ReflectionClass(Person::class);
        $rmeth = $rpers->getMethod('setInfo');
        $attrs = $rmeth->getAttributes(ApiInfo::class, ReflectionAttribute::IS_INSTANCEOF);
        foreach ($attrs as $attr) {
            print $attr->getName() . "\n";
            $attrObj = $attr->newInstance();
            print "  - " . $attrObj->compInfo . "\n";
            print "  - " . $attrObj->depInfo . "\n";
        }
    }
}