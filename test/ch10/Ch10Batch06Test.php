<?php

namespace popp\ch10;

use popp\BaseUnit;
use popp\ch10\batch06\Runner;

class Ch10Batch06Test extends BaseUnit {
    public function testRunner()
    {
        $val = $this->capture(function() {
            Runner::run();
        });
        self::assertEquals("-2", $val);

        $val2 = $this->capture(function() {
            Runner::run2();
        });
        self::assertEquals("2", $val2);

        $val3 = $this->capture(function() {
            Runner::run3();
        });
        self::assertEquals("4", $val3);

        $val4 = $this->capture(function() {
            Runner::run4();
        });
        self::assertEquals("0", $val4);
    }
}
