<?php declare(strict_types=1);

namespace ch10;

use popp\test\BaseUnit;
use popp\ch10\batch01\Archer;
use popp\ch10\batch01\LaserCannonUnit;
use popp\ch10\batch01\Runner;

class Ch10Batch01Test extends BaseUnit {
    public function testProduct()
    {
        $archer = new Archer();
        self::assertEquals(4, $archer->bombardStrength());

        $cannon = new LaserCannonUnit();
        self::assertEquals(44, $cannon->bombardStrength());
    }

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertEquals(48, $val);
    }
}
