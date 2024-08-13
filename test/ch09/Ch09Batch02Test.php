<?php declare(strict_types = 1);

namespace popp\test\ch09;

use popp\test\BaseUnit;
use popp\ch09\batch02\Runner;

class Ch09Batch02Test extends BaseUnit
{
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        $expected = <<<EXPECTED
mary: I'll clear my desk
bob: I'll call my lawyer
harry: I'll clear my desk

EXPECTED;

        self::assertEquals($expected, $val);
    }
}