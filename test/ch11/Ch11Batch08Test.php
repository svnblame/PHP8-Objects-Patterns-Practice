<?php declare(strict_types=1);

namespace popp\ch11;

use popp\BaseUnit;
use popp\ch11\batch08\Runner;

class Ch11Batch08Test extends BaseUnit {
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });

        $out = <<<OUT
popp\ch11\batch08\Army: bombard: 50
    popp\ch11\batch08\Archer: bombard: 4
    popp\ch11\batch08\LaserCannonUnit: bombard: 44
    popp\ch11\batch08\Cavalry: bombard: 2

OUT;
        self::assertEquals($out, $val);

        $val = $this->capture(function() { Runner::run2(); });

        $out = <<<OUT
Tax levied for popp\ch11\batch08\Army: 1
Tax levied for popp\ch11\batch08\Archer: 2
Tax levied for popp\ch11\batch08\LaserCannonUnit: 1
Tax levied for popp\ch11\batch08\Cavalry: 3
TOTAL: 7

OUT;

        //print $val;
        self::assertEquals($out, $val);
    }
}
