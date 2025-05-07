<?php declare(strict_types = 1);

namespace popp\ch09;

use popp\BaseUnit;
use popp\ch09\batch09\Runner;

class Ch09Batch09Test extends BaseUnit
{
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });

        $expected = <<<EXPECTED
MegaCal header
Appointment data encoded in MegaCal format
MegaCal footer

EXPECTED;

        $this->assertEquals($expected, $val);
    }
}