<?php declare(strict_types=1);

namespace popp\ch04;

require_once 'vendor/autoload.php';

use popp\BaseUnit;
use popp\ch04\Batch06_9\Runner;

class Batch06_9Test extends BaseUnit
{
    public function testBreachPrivacy()
    {
        self::expectException(\Error::class);
        Runner::run();
    }

    public function testFinalPrice()
    {
        $val = $this->capture(function() { Runner::run2(); });
        self::assertEquals("120\n", $val);
    }
}