<?php declare(strict_types=1);

namespace popp\ch05;

use popp\ch05\batch02\my\Outputter;
use popp\BaseUnit;

class Ch05Batch01and02Test extends BaseUnit
{
    /**
     * @test
     * @return void
     */
    public function testBatch02Outputter()
    {
        require_once(__DIR__ . '/../../src/ch05/batch02/my/Outputter.php');
        $o = new Outputter();
        self::assertTrue($o instanceof Outputter);
    }
}
