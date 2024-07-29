<?php declare(strict_types=1);

namespace popp\test\ch05;

use popp\test\BaseUnit;
use popp\ch05\batch03\my\Outputter;

class Ch05Batch03Test extends BaseUnit
{
    /**
     * @test
     * @return void
     */
    public function testBatch03Outputter()
    {
        $o = new Outputter();

        self::assertTrue($o instanceof Outputter);
    }
}