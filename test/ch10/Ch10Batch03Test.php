<?php

namespace ch10;

use popp\test\BaseUnit;
use popp\ch10\batch03\Army;
use popp\ch10\batch03\Soldier;
use popp\ch10\batch03\Tank;
use popp\ch10\batch03\Runner;
use popp\ch10\batch03\Archer;


class Ch10Batch03Test extends BaseUnit {
    public function testArmy() {
        $tank = new Tank();
        $tank2 = new Tank();
        $soldier = new Soldier();

        $army = new Army();
        $army->addUnit($soldier);
        $army->addUnit($tank);
        $army->addUnit($tank2);

        self::assertCount(3, $army->getUnits());

        $army->removeUnit($tank2);
        self::assertCount(2, $army->getUnits());
    }
}
