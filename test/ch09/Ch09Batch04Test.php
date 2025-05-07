<?php declare(strict_types = 1);

namespace popp\ch09;

use popp\BaseUnit;
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
