<?php

declare(strict_types=1);

namespace ch18;

use popp\BaseUnit;
use popp\ch18\batch01\Runner;

class Ch18Batch01Test extends BaseUnit
{
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });

        self::assertMatchesRegularExpression("/\[pass] => 12345/", $val);
        self::assertMatchesRegularExpression("/\[mail] => bob@example.com/", $val);
        self::assertMatchesRegularExpression("/\[name] => bob williams/", $val);
        self::assertMatchesRegularExpression("/\[failed] => \d+/", $val);
    }
}
