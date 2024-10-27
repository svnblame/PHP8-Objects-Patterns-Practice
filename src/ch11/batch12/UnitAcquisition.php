<?php declare(strict_types=1);

namespace popp\ch11\batch12;

use popp\ch11\batch08\Army;
use popp\ch11\batch08\Archer;
use popp\ch11\batch08\Cavalry;
use popp\ch11\batch08\LaserCannonUnit;

class UnitAcquisition {
    /* listing 11.61 */
    public function getUnits(int $x, int $y): array
    {
        $army = new Army();
        $army->addUnit(new Archer());

        return [
            new Cavalry(),
            new NullUnit(),
            new LaserCannonUnit(),
            $army
        ];
    }
}
