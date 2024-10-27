<?php declare(strict_types=1);

namespace ch11;

use popp\test\BaseUnit;
use popp\ch11\batch12\UnitAcquisition;
use popp\ch11\batch12\TileForces;

class Ch11Batch12Test extends BaseUnit {
    public function testTileForces()
    {
        $acquirer   = new UnitAcquisition();
        $tileForces = new TileForces(4, 2, $acquirer);

        $power  = $tileForces->firePower();
        $health = $tileForces->health();

        self::assertEquals(50, $power);
        self::assertEquals(30, $health);
    }
}
