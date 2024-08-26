<?php declare(strict_types = 1);

namespace popp\test\ch09;

use popp\test\BaseUnit;
use popp\ch09\batch14\Runner;
use popp\ch09\batch06\BloggsApptEncoder;
use popp\ch09\batch11\TerrainFactory;
use popp\ch09\batch11\EarthSea;
use popp\ch09\batch11\MarsPlains;
use popp\ch09\batch11\Forest;
use popp\ch09\batch11\EarthForest;

class Ch09Batch14Test extends BaseUnit {
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertEquals("Appointment data encoded in BloggsCal format\n", $val);
    }
}
