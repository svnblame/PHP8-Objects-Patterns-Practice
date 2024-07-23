<?php declare(strict_types=1);

namespace popp\test\ch05;

use popp\test\BaseUnit;
use popp\ch05\batch04\Runner;

class Batch04Test extends BaseUnit
{
    /*
     * @test
     * Uncomment for fatal error - namespace clash
     */
/*    public function testClash()
    {
        require_once('src/ch05/batch04/clash.php');
    }*/

    /*
     * @test
     */
    public function testRunner()
    {
        $val = $this->capture(function () { Runner::runbefore(); });

        $expected = <<<EXPECTED
hello from popp\ch05\batch04\Debug

EXPECTED;

        self::assertEquals($expected, $val);

    }
}
