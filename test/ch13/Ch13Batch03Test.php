<?php declare(strict_types=1);

namespace popp\ch13;

use popp\ch13\batch01\AppException;
use popp\BaseUnit;
use popp\ch13\batch03\Runner;

class Ch13Batch03Test extends BaseUnit {
    public function testRunner()
    {
        $val = $this->capture(
            /** @throws AppException */
            function() { Runner::run(); }
        );

        $expected = <<<EXPECTED
The Likey Lounge
The Something Else
The Bibble Beer Likey Lounge

EXPECTED;

        $this->assertEquals($expected, $val);

        $val = $this->capture(function() { Runner::run2(); });
        self::assertEquals("The Bibble Beer Likey Lounge\n", $val);
    }
}
