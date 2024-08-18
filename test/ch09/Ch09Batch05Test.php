<?php declare(strict_types = 1);

namespace popp\test\ch09;

use popp\test\BaseUnit;
use popp\ch09\batch05\Runner;

class Ch09Batch05Test extends BaseUnit
{
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        $expected = <<<EXPECTED
** real DSN
** test DSN

EXPECTED;

        self::assertEquals($expected, $val);
    }
}