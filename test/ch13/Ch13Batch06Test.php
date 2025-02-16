<?php declare(strict_types=1);

namespace ch13;

use popp\test\BaseUnit;
use popp\ch13\batch06\Runner;

class Ch13Batch06Test extends BaseUnit {
    public function testRunner()
    {
        $val = $this->capture(function () { Runner::run(); });
        self::assertMatchesRegularExpression("/^ WHERE name = 'A Fine Show' and start > \d+/", $val);
    }
}
