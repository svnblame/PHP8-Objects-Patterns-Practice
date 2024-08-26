<?php declare(strict_types = 1);

namespace popp\test\ch09;

use popp\test\BaseUnit;
use popp\ch09\batch14_1\Runner;
use popp\ch09\batch06\BloggsApptEncoder;
use popp\ch09\batch11\TerrainFactory;

class Ch09Batch14_1Test extends BaseUnit {
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertEquals("Appointment data encoded in BloggsCal format\n", $val);
    }

    public function testRunnerNotInConf()
    {
        $val = $this->capture(function() { Runner::run2(); });
        self::assertEquals("Appointment data encoded in MegaCal format\n", $val);
    }
}
