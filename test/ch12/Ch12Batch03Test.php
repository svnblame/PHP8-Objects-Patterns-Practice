<?php declare(strict_types=1);

namespace popp\ch12;

use popp\BaseUnit;
use popp\ch12\batch03\Runner;

class Ch12Batch03Test extends BaseUnit {
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertMatchesRegularExpression('/Request/', $val);
    }
}
