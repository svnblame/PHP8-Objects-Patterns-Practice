<?php declare(strict_types = 1);

namespace popp\test\ch09;

use popp\test\BaseUnit;
use popp\ch09\batch07\Runner;

class Ch09Batch07Test extends BaseUnit
{
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        $expected = <<<EXPECTED
popp\\ch09\\batch07\\MegaApptEncoder
popp\\ch09\\batch07\\BloggsApptEncoder

EXPECTED;

        self::assertEquals($expected, $val);

        $val = $this->capture(function() { Runner::run2(); });
        $expected = <<<EXPECTED
MegaCal header
BloggsCal header

EXPECTED;

        self::assertEquals($expected, $val);
    }
}
