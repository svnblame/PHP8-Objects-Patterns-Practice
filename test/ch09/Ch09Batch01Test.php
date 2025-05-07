<?php declare(strict_types = 1);

namespace popp\ch09;

use popp\BaseUnit;
use popp\ch09\batch01\Runner;

class Ch09Batch01Test extends BaseUnit
{
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertEquals("mary: I'll clear my desk\n", $val);
    }
}