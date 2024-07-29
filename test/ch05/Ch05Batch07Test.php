<?php declare(strict_types=1);

namespace popp\test\ch05;

use popp\test\BaseUnit;
use popp\ch05\batch07\Runner;

class Ch05Batch07Test extends BaseUnit
{
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run2(); });
        self::assertMatchesRegularExpression('/getInstance/', $val);

        $val = $this->capture(function() { Runner::run3(); });
        self::assertMatchesRegularExpression('/producerFirstName/', $val);
    }
}