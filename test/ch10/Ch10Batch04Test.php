<?php

namespace ch10;

use popp\test\BaseUnit;
use popp\ch10\batch04\Tank;
use popp\ch10\batch04\Soldier;
use popp\ch10\batch04\Army;
use popp\ch10\batch04\Archer;

class Ch10Batch04Test extends BaseUnit
{
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

    public function testArcher()
    {
        $archer = new Archer();
        $tank = new Tank();

        try {
            $archer->addUnit($tank);
            self::fail("Exception should have been thrown");
        } catch (\Exception $e) {
            self::assertEquals("popp\\ch10\\batch04\\Archer is a leaf", $e->getMessage());
        }
    }
}
