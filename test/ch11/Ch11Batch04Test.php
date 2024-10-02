<?php declare(strict_types = 1);

namespace ch11;

use popp\test\BaseUnit;
use popp\ch11\batch04\Runner;

class Ch11Batch04Test extends BaseUnit
{
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });

        self::assertMatchesRegularExpression("|Logger: bob, ip: 158.152.55.35 status:\d/bob/158\\.152\\.55\\.35|", $val);
        self::assertMatchesRegularExpression("|Notifier: bob, ip: 158.152.55.35 status:\d/bob/158\\.152\\.55\\.35|", $val);
    }
}
