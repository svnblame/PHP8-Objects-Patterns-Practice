<?php declare(strict_types = 1);

namespace popp\test\ch09;

use popp\test\BaseUnit;
use popp\ch09\batch04\Runner;

class Ch09Batch04Test extends BaseUnit
{
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });

        $expected = "matt\n";
        self::assertEquals($expected, $val);
    }
}
