<?php declare(strict_types=1);

namespace popp\ch11;

use popp\BaseUnit;
use popp\ch11\batch11\UnitAcquisition;
use popp\ch11\batch11\TileForces;

class Ch11Batch11Test extends BaseUnit {
    public function testRunner()
    {
        $acquirer   = new UnitAcquisition();
        $tileForces = new TileForces(4, 2, $acquirer);

        $power =  $tileForces->firePower();
        $health = $tileForces->health();

        self::assertEquals(50, $power);
        self::assertEquals(30, $health);
    }
}
