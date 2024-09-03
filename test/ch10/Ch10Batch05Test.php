<?php

namespace ch10;

use popp\test\BaseUnit;
use popp\ch10\batch05\Tank;
use popp\ch10\batch05\Soldier;
use popp\ch10\batch05\Army;

class Ch10Batch05Test extends BaseUnit {
    public function testArmy()
    {
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
