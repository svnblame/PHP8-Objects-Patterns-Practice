<?php declare(strict_types = 1);

namespace popp\ch11;

use popp\BaseUnit;
use popp\ch11\batch03\Runner;

class Ch11Batch03Test extends BaseUnit {
    /**
     * @test
     * @return void
     */
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertMatchesRegularExpression('/returning (true|false)/', $val);
    }
}
