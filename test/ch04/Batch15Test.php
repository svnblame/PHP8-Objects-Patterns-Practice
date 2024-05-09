<?php declare(strict_types=1);

namespace popp\test\ch04;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;
use popp\ch04\batch15\Runner;

class Batch15Test extends BaseUnit 
{
    public function testRunnerJustBob()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertEquals("Bob, 44", $val);
    }

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run2(); });
        self::assertEquals("Bob, 44", $val);
    }
}