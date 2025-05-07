<?php declare(strict_types=1);

namespace popp\ch04;

require_once 'vendor/autoload.php';

use popp\BaseUnit;
use popp\ch04\Batch13\Checkout;

class Batch13Test extends BaseUnit 
{
    public function testRunner() 
    {
        $checkout = new Checkout();
        self::assertTrue($checkout instanceof Checkout);
    }
}