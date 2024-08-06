<?php declare(strict_types=1);

namespace popp\test\ch05;

use popp\test\BaseUnit;
use popp\ch05\batch08\Runner;

class Ch05Batch08Test extends BaseUnit
{
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });

        $expected = <<<EXPECTED
PersonModule::setPerson(): bob
FtpModule::setHost(): example.com
FtpModule::setUser(): anon

EXPECTED;

        self::assertEquals($expected, $val);
    }
}