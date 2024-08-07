<?php declare(strict_types=1);

namespace popp\test\ch05;

use popp\test\BaseUnit;
use popp\ch05\batch09\Runner;

class Ch05Batch09Test extends BaseUnit
{
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::runClass(); });
        $expected = <<<EXPECTED
popp\ch05\batch09\info

EXPECTED;

        self::assertEquals($expected, $val);
    }
}