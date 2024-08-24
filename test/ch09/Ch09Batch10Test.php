<?php declare(strict_types = 1);

namespace popp\test\ch09;

use popp\test\BaseUnit;
use popp\ch09\batch10\Runner;

class Ch09Batch10Test extends BaseUnit {
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });

        $expected = <<<EXPECTED
BloggsCal header
Appointment data encoded in BloggsCal format
BloggsCal footer

EXPECTED;

        $this->assertEquals($expected, $val);
    }
}
