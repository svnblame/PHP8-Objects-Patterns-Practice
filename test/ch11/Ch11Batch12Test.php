<?php declare(strict_types=1);

namespace popp\ch11;

use popp\BaseUnit;
use popp\ch11\batch12\UnitAcquisition;
use popp\ch11\batch12\TileForces;
use popp\ch11\batch12\Runner;

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

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });

        $out = "null - no action\n";
        self::assertEquals($out, $val);
    }
}
