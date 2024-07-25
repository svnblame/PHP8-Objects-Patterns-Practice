<?php declare(strict_types=1);

namespace popp\test\ch05;

use Exception;
use popp\test\BaseUnit;
use popp\ch05\batch05\Runner;

class Ch05Batch05Test extends BaseUnit
{
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::runBefore(); });

        $expected = <<<EXPECTED
hello

EXPECTED;

        self::assertEquals($expected, $val);

        $val = $this->capture(/** * @throws Exception */ function() { Runner::run(); });

        self::assertEquals($expected, $val);

        $val = $this->capture(function() { Runner::run2(); });

        $expected = <<<EXPECTED
\$product is a CdProduct object
\$product is an instance of CdProduct

EXPECTED;

        self::assertEquals($expected, $val);



    }
}
