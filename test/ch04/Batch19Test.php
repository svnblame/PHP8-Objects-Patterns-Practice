<?php declare(strict_types=1);

namespace popp\test\ch04;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;
use popp\ch04\Batch19\Runner;

class Batch19Test extends BaseUnit 
{
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertEquals("saving person\n", $val);
    }

    public function testCopyMeRef()
    {
        list($a, $b) = Runner::run2();
        self::assertSame($a, $b);
    }

    public function testCopyMeClone()
    {
        list($a, $b) = Runner::run3();
        self::assertNotSame($a, $b);
    }
}