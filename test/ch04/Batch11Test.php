<?php declare(strict_types=1);

namespace popp\ch04\batch11;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;
use popp\AppConfig;

class Batch11Test extends BaseUnit 
{
    private string $logFile = '';

    public function setUp(): void
    {
        $this->logFile = AppConfig::get('log');
    }

    public function testRunnerExceptionNoFinally()
    {
        $this->capture(function() { Runner::run(); });
        $contents = file_get_contents($this->logFile);
        self::assertEquals("start\nxml exception\n", $contents);
    }

    public function testRunnerExceptionWithFinally() 
    {
        $this->capture(function() { Runner::run2(); });
        $contents = file_get_contents($this->logFile);
        self::assertEquals("start\nfile exception\nend\n", $contents);
    }

    public function testRunnerBuiltInError()
    {
        $val = $this->capture(function() { Runner::run3(); });
        self::assertEquals("ParseError\nsyntax error, unexpected identifier \"code\"", $val);
    }
}
