<?php declare(strict_types=1);

namespace popp\test\ch04;

require_once 'vendor/autoload.php';

use popp\test\BaseUnit;
use popp\ch04\Batch06\Runner;

class Batch06Test extends BaseUnit 
{
    public function testRunner()
    {
        $this->expectException(\Error::class);
        Document::create();
    }

    public function testCalculateTax()
    {
        $val = $this->capture(function() { Runner::run2(); });
        self::assertEquals("20\n", $val);
    }
}
