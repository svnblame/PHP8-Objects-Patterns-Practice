<?php declare(strict_types=1);

namespace popp\ch11;

use popp\BaseUnit;
use popp\ch11\batch09\Runner;

class Ch11Batch09Test extends BaseUnit {
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });

        $out = <<<OUT
OUT;
        self::assertEquals($out, $val);
    }

    public function testRunner2()
    {
        $val = $this->capture(function() { Runner::run2(); });

        $out = <<<OUT
sending bob@bob.com: my brain: all about my brain

OUT;
        self::assertEquals($out, $val);

    }
}