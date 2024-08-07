<?php declare(strict_types=1);

namespace popp\ch05\batch09;

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
}