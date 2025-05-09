<?php

namespace popp\ch11;

use popp\BaseUnit;
use popp\ch11\batch01\Runner;

class Ch11Batch01Test extends BaseUnit {
    public function testEval()
    {
        $val = $this->capture(function() { Runner::run4(); });
        self::assertMatchesRegularExpression('/nobody/', $val);
    }

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertEquals("four\n", $val);

        $val = $this->capture(function() { Runner::run2(); });
        self::assertEquals("four\nfour\nfive\nfive\n", $val);

        $val = $this->capture(function() { Runner::run3(); });
        $expected= <<<OUT
four:
top marks

4:
top marks

52:
dunce hat on


OUT;

        self::assertEquals($expected, $val);
    }
}
