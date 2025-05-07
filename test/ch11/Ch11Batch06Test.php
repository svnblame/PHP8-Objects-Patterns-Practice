<?php declare(strict_types=1);

namespace popp\ch11;

use popp\BaseUnit;
use popp\ch11\batch06\Runner;

class Ch11Batch06Test extends BaseUnit {
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertMatchesRegularExpression("|sending mail to sysadmin|", $val);
    }

    public function testRunner2()
    {
        $val = $this->capture(function() { Runner::run2(); });
        self::assertEquals("", $val);
    }
}
