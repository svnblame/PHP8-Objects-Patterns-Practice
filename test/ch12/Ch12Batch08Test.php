<?php declare(strict_types=1);

namespace ch12;

use popp\test\BaseUnit;
use popp\ch12\batch08\Runner;

class Ch12Batch08Test extends BaseUnit {
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertMatchesRegularExpression('/choose a name for the venue/', $val);

        $val = $this->capture(function() { Runner::run2(); });
        self::assertMatchesRegularExpression('/name is a required field/', $val);

        $val = $this->capture(function() { Runner::run3(); });
        self::assertMatchesRegularExpression("/Error/", $val);
    }
}
