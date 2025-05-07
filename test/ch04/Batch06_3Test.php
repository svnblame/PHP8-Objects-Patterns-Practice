<?php declare(strict_types=1);

namespace popp\ch04;

require_once 'vendor/autoload.php';

use popp\BaseUnit;
use popp\ch04\Batch06_3\Runner;

class Batch06_3Test extends BaseUnit 
{
    public function testCombinedTraitInterface()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertMatchesRegularExpression("/20\n[a-f0-9]+\n/", $val);
    }

    public function testFatalCollision()
    {
        $val = $this->capture(function() { Runner::run2(); });
        self::assertEquals('222', $val);
    }
}
