<?php declare(strict_types=1);

namespace popp\test\ch05;

use popp\test\BaseUnit;
use popp\ch05\batch09\Runner;

class Ch05Batch09Test extends BaseUnit
{
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::runClass(); });
        $expected = <<<EXPECTED
popp\ch05\batch09\info

EXPECTED;

        self::assertEquals($expected, $val);
    }

    public function testRunMethod1()
    {
        $val = $this->capture(function() { Runner::runMethod1(); });

        $expected = <<<EXPECTED
popp\ch05\batch09\moreinfo

EXPECTED;

        self::assertEquals($expected, $val);
    }

    public function testRunMethod2()
    {
        $val = $this->capture(function() { Runner::runMethod2(); });
        $expected = <<<EXPECTED
popp\ch05\batch09\ApiInfo
  - The 3 digit company identifier
  - A five character department tag

EXPECTED;

        self::assertEquals($expected, $val);
    }
}
