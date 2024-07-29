<?php declare(strict_types=1);

namespace popp\test\ch05;

use popp\test\BaseUnit;
use popp\ch05\batch06\Runner;

class Ch05Batch06Test extends BaseUnit
{
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertEquals("thing\n", $val);
    }
}