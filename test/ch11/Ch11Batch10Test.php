<?php declare(strict_types=1);

namespace ch11;

use popp\test\BaseUnit;
use popp\ch11\batch10\Runner;
use popp\ch11\batch10\UnitAcquisition;
use popp\ch11\batch10\TileForces;

class Ch11Batch10Test extends BaseUnit {

    public function testTileForces()
    {
        $acquirer = new UnitAcquisition();
        $tileForces = new TileForces(4, 2, $acquirer);

        $this->expectException(\Error::class);

        $power = $tileForces->firePower();
        $health = $tileForces->health();

        self::assertEquals(50, $power);
        self::assertEquals(30, $health);
    }


}
