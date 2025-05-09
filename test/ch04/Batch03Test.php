<?php declare(strict_types=1);

namespace popp\ch04;

require_once 'vendor/autoload.php';

use popp\BaseUnit;
use popp\ch04\batch03\Runner;
use popp\ch04\batch03\ErroredWriter;

class Batch03Test extends BaseUnit 
{
    public function testRunnerFailAbstractInstantiate() 
    {
        $this->expectException(\Error::class);
        Runner::run2();
    }

    public function testErroredWriter() 
    {
        // uncomment to show fatal error - class does not implement abstract methods
        // $writer = new ErroredWriter();
        self::assertTrue(true);
    }

    public function testRunnerXmlWriter() 
    {
        $val = $this->capture(function() { Runner::run4(); });
        self::assertMatchesRegularExpression("/Coldharbour/", $val);
    }

    public function testRunnerTextWriter() 
    {
        $val = $this->capture(function() { Runner::run3(); });
        self::assertMatchesRegularExpression("/Coldharbour/", $val);
    }
}
