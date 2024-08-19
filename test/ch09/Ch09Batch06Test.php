<?php declare(strict_types = 1);

namespace popp\test\ch09;

use popp\test\BaseUnit;
use popp\ch09\batch06\Runner;

class Ch09Batch06Test extends BaseUnit
{
    public function testRunner(): void
    {
        $val = $this->capture(function() { Runner::run(); });
        $expected = "Appointment data encoded in BloggsCal format\n\n";
        self::assertEquals($expected, $val);
    }
}
