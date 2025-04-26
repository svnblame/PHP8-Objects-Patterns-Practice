<?php

declare(strict_types=1);

namespace popp\ch18;

use popp\BaseUnit;

class Ch18Batch01Test extends BaseUnit
{
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
    }
}
