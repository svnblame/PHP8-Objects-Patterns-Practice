<?php declare(strict_types = 1);

namespace popp\ch09;

use popp\BaseUnit;
use popp\ch09\batch11\Runner;

class Ch09Batch11Test extends BaseUnit {
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });

        $expected = <<<EXPECTED
popp\\ch09\\batch11\\EarthSea Object
(
)
popp\\ch09\\batch11\\EarthPlains Object
(
)
popp\\ch09\\batch11\\EarthForest Object
(
)

EXPECTED;

        self::assertEquals($expected, $val);
    }

    public function testRunner2()
    {
        $val = $this->capture(function() { Runner::run2(); });

        $expected = <<<EXPECTED
popp\\ch09\\batch11\\EarthSea Object
(
)
popp\\ch09\\batch11\\MarsPlains Object
(
)
popp\\ch09\\batch11\\EarthForest Object
(
)

EXPECTED;

        self::assertEquals($expected, $val);
    }
}