<?php declare(strict_types=1);

namespace popp\ch04;

use popp\BaseUnit;
use popp\ch04\batch23\Runner;

class Batch23Test extends BaseUnit
{
    public function testRunner()
    {
        $val = $this->capture(function() {
            Runner::run2();
        });

        $expected = <<<EXPECTED
shoes: processing
    logging (shoes)

coffee: processing
    logging (coffee)

EXPECTED;
        self::assertEquals($expected, $val);
    }

    public function testRunnerArrowFunction()
    {
        $val = $this->capture(function() {
            Runner::run3();
        });

        $expected = <<<EXPECTED
shoes: processing
    logging (shoes)

coffee: processing
    logging (coffee)

EXPECTED;

        self::assertEquals($expected, $val);
    }
}
