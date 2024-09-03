<?php

namespace ch10;

use popp\test\BaseUnit;
use popp\ch10\batch06\Runner;

class Ch10Batch06Test extends BaseUnit {
    public function testRunner()
    {
        $val = $this->capture(function() {
            Runner::run();
        });

        self::assertEquals("-2", $val);
    }
}
