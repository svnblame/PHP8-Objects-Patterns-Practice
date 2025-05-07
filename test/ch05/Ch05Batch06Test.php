<?php declare(strict_types=1);

namespace popp\ch05;

use popp\BaseUnit;
use popp\ch05\batch06\Runner;

class Ch05Batch06Test extends BaseUnit
{
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertEquals("thing\n", $val);
    }
}