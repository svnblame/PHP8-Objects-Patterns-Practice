<?php declare(strict_types=1);

namespace popp\ch04;

require_once 'vendor/autoload.php';

use popp\BaseUnit;
use popp\ch04\Batch06_2\Runner;

class Batch06_2Test extends BaseUnit 
{
    public function testRunner() 
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertMatchesRegularExpression("/20\n[a-f0-9]+\n/", $val);
    }
}