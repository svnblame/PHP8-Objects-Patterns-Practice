<?php

namespace popp\ch10;

use popp\BaseUnit;
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

    public function testArcher()
    {
        $archer = new Archer();
        $tank = new Tank();

        try {
            $archer->addUnit($tank);
            self::fail("Exception should have been thrown");
        } catch (\Exception $ex) {
            self::assertEquals("popp\\ch10\\batch03\\Archer is a leaf", $ex->getMessage());
        }
    }
}
