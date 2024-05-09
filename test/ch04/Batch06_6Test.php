<?php declare(strict_types=1);

namespace popp\test\ch04;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;
use popp\ch04\Batch06_6\Runner;

class Batch06_6Test extends BaseUnit
{
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertEquals("20\n", $val); 
    }
}