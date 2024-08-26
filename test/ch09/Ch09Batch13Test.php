<?php declare(strict_types = 1);

namespace popp\test\ch09;

use popp\test\BaseUnit;
use popp\ch09\batch13\Runner;

class Ch09Batch13Test extends BaseUnit {
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });

        self::assertEquals("Appointment data encoded in MegaCal format\n", $val);
    }
}
