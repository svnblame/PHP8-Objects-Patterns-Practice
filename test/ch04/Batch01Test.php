<?php declare(strict_types=1);

namespace popp\test\ch04;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;
use popp\ch04\batch01\Runner;

class Batch01Test extends BaseUnit 
{
    public function testRunner() 
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertEquals("0hello", $val);
    
        $val = $this->capture(function() { Runner::run2(); });
        $expected = "hello (1)\nhello (2)\nhello (3)\n";
        self::assertEquals($expected, $val);
    }
}
