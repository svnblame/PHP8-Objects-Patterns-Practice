<?php declare(strict_types=1);

namespace popp\ch10\batch04;

use popp\ch10\batch04\LaserCannonUnit;

class Runner {
    /**
     * @throws UnitException
     */
    public static function run(): void
    {
        /* listing 10.12 */
        // create an army
        $mainArmy = new Army();

        // add some units
        $mainArmy->addUnit(new Archer());
        $mainArmy->addUnit(new LaserCannonUnit());

        // create a new army
        $subArmy = new Army();

        // add some units
        $subArmy->addUnit(new Archer());
        $subArmy->addUnit(new Archer());
        $subArmy->addUnit(new Archer());

        // add the second army to the first
        $mainArmy->addUnit($subArmy);

        // all the calculations handled behind the scenes
        print "attacking with strength: {$mainArmy->bombardStrength()}\n";
    }
}
