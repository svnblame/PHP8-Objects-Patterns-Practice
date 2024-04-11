<?php declare(strict_types=1);

namespace popp\ch04\batch11;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch11Test extends BaseUnit 
{
    public function testRunnerExeptionNoFinally()
    {
        $logfile = "/usr/local/share/logs/log.txt";
        if (file_exists($logfile)) {
            unlink($logfile);
        }
        $val = $this->capture(function() { Runner::run(); });
        $contents = file_get_contents($logfile);
        self::assertEquals("start\nxml exception\n", $contents);
    }
}