<?php declare(strict_types=1);

namespace popp\test\ch04;

require_once 'vendor/autoload.php';

use popp\test\BaseUnit;
use popp\ch04\Batch21\Runner;

class Batch21Test extends BaseUnit
{
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertEquals(210, $val);
    }

    public function testRunnerShallow()
    {
        $val = $this->capture(function() { Runner::run2(); });
        self::assertEquals(200, $val);
    }
}