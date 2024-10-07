<?php declare(strict_types=1);

namespace ch11;

use popp\test\BaseUnit;
use popp\ch11\batch05\Runner;

class Ch11Batch05Test extends BaseUnit {
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertMatchesRegularExpression('|sending mail to sysadmin|', $val);
        self::assertMatchesRegularExpression('|add login data to log|', $val);

        // test run2() ...
    }
}