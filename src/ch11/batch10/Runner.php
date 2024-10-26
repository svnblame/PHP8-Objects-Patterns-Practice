<?php declare(strict_types=1);

namespace popp\ch11\batch10;

class Runner {
    public static function run(): void
    {
        /* listing 11.58 */
        $acquirer = new UnitAcquisition();
        $tileForces = new TileForces(4, 2, $acquirer);
        $power = $tileForces->firePower();

        print "power is {$power}\n";
    }
}
