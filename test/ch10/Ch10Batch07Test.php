<?php

namespace ch10;

use popp\test\BaseUnit;
use popp\ch10\batch07\Runner;

class Ch10Batch07Test extends BaseUnit {
    public function testRunner()
    {
        $val = $this->capture(function() {
            Runner::run();
        });

        self::assertMatchesRegularExpression("/authenticating request/", $val);
        self::assertMatchesRegularExpression("/structuring request data/", $val);
        self::assertMatchesRegularExpression("/logging request/", $val);
        self::assertMatchesRegularExpression("/doing something useful with request/", $val);
    }
}
