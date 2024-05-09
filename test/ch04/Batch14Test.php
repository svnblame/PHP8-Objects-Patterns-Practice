<?php declare(strict_types=1);

namespace popp\test\ch04;

require_once 'vendor/autoload.php';

use popp\test\BaseUnit;
use popp\ch04\batch14\Runner;
use popp\ch04\batch14\Checkout;

class Batch14Test extends BaseUnit 
{
    public function testRunner()
    {
        Runner::run();
        $checkout = new Checkout();
        $void = $checkout->totalize();
        self::assertTrue($checkout instanceof Checkout);
    }
}