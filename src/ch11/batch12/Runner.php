<?php declare(strict_types=1);

namespace popp\ch11\batch12;

class Runner {
    public static function run(): void
    {
        $unit = new NullUnit();

        /* listing 11.63 */
        if (! $unit->isNull()) {
            // do something
        } else {
            print "null - no action\n";
        }
    }
}
