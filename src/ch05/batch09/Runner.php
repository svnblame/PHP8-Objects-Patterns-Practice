<?php declare(strict_types=1);

namespace popp\ch05\batch09;

use ReflectionClass;

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
}