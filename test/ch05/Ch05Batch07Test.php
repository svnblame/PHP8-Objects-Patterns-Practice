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

        $val = $this->capture(function() { Runner::run4(); });
        $expected = <<<EXPECTED
popp\ch04\batch02\CdProduct is user defined
popp\ch04\batch02\CdProduct can be instantiated
popp\ch04\batch02\CdProduct can be cloned

EXPECTED;

        self::assertEquals($expected, $val);

        $val = $this->capture(function() { Runner::run5(); });
        self::assertMatchesRegularExpression('/getSummaryLine/', $val);

        $val = $this->capture(function() { Runner::run6(); });
        self::assertMatchesRegularExpression('/getDiscount is user defined/', $val);
    }
}