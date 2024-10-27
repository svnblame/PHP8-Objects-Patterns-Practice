<?php declare(strict_types=1);

namespace ch12;

use popp\test\BaseUnit;
use popp\ch12\batch03\Runner;

class Ch12Batch03Test extends BaseUnit {
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertMatchesRegularExpression('/Request/', $val);
    }
}
