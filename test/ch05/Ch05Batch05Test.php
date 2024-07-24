<?php declare(strict_types=1);

namespace popp\test\ch05;

use popp\test\BaseUnit;
use popp\ch05\batch05\Runner;

class Ch05Batch05Test extends BaseUnit
{
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::runbefore(); });

        $expected = <<<EXPECTED
hello

EXPECTED;

        self::assertEquals($expected, $val);

    }
}
