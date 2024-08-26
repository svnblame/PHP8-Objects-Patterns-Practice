<?php declare(strict_types = 1);

namespace popp\test\ch09;

use popp\test\BaseUnit;
use popp\ch09\batch12\Runner;

class Ch09Batch12Test extends BaseUnit {
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });

        $expected = <<<EXPECTED
popp\\ch09\\batch12\\EarthSea Object
(
    [navigability:popp\\ch09\\batch12\\Sea:private] => -1
)
popp\\ch09\\batch12\\EarthPlains Object
(
)
popp\\ch09\\batch12\\EarthForest Object
(
)

EXPECTED;

        self::assertEquals($expected, $val);
    }
}