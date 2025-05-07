<?php declare(strict_types=1);

namespace popp\ch04;

require_once 'vendor/autoload.php';

use popp\BaseUnit;
use popp\ch04\Batch06_1\Runner;

class Batch06_1Test extends BaseUnit 
{
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertEquals("20\n20\n", $val);
    }
}
