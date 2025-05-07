<?php

namespace popp\ch10;

use popp\BaseUnit;
use popp\ch10\batch05\Tank;
use popp\ch10\batch05\Soldier;
use popp\ch10\batch05\Army;
use popp\ch10\batch05\TroopCarrier;
use popp\ch10\batch05\Archer;
use popp\ch10\batch05\Cavalry;

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

    public function testTroopCarrier()
    {
        $carrier = new TroopCarrier();
        $carrier->addUnit(new Archer());
        $carrier->addUnit(new Tank());

        try {
            $carrier->addUnit(new Cavalry());
            self::fail("should have thrown exception");
        } catch (\Exception $e) {
            self::assertEquals("Can't get a horse on the vehicle", $e->getMessage());
        }
    }
}
