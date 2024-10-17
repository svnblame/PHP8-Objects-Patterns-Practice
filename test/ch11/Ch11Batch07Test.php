<?php declare(strict_types=1);

namespace ch11;

use popp\test\BaseUnit;
use popp\ch11\batch07\Runner;

class Ch11Batch07Test extends BaseUnit {
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        $out = <<<OUT
popp\ch11\batch07\Army: bombard: 52
    popp\ch11\batch07\Archer: bombard: 4
    popp\ch11\batch07\LaserCannonUnit: bombard: 44
    popp\ch11\batch07\Army: bombard: 2
        popp\ch11\batch07\Cavalry: bombard: 2
    popp\ch11\batch07\Cavalry: bombard: 2

OUT;
        self::assertEquals($val, $out);
    }
}
