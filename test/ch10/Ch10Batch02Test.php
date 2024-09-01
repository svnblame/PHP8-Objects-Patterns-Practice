<?php

namespace ch10;

use popp\test\BaseUnit;
use popp\ch10\batch02\Archer;
use popp\ch10\batch02\LaserCannonUnit;

class Ch10Batch02Test extends BaseUnit {
    public function testBombard()
    {
        $archer = new Archer();
        self::assertEquals(4, $archer->bombardStrength());

        $cannon = new LaserCannonUnit();
        self::assertEquals(44, $cannon->bombardStrength());
    }
}