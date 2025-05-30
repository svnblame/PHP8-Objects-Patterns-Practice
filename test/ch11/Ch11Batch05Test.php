<?php declare(strict_types=1);

namespace popp\ch11;

use popp\BaseUnit;
use popp\ch11\batch05\Runner;

class Ch11Batch05Test extends BaseUnit {
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertMatchesRegularExpression('|sending mail to sysadmin|', $val);
        self::assertMatchesRegularExpression('|add login data to log|', $val);

        $val = $this->capture(function() { Runner::run2(); });
        self::assertMatchesRegularExpression('|doing something with status info|', $val);
    }
}
