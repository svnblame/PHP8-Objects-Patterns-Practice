<?php declare(strict_types=1);

namespace popp\ch04;

require_once 'vendor/autoload.php';

use popp\BaseUnit;
use popp\ch04\batch17\Runner;

class Batch17Test extends BaseUnit 
{
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run2(); });
        self::assertEquals("BOB", $val);
    }
}