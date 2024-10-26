<?php declare(strict_types=1);

namespace ch11;

use popp\test\BaseUnit;
use popp\ch11\batch09\Runner;

class Ch11Batch09Test extends BaseUnit {
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });

        $out = <<<OUT
OUT;
        self::assertEquals($out, $val);
    }
}