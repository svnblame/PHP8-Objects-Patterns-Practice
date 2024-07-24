<?php

namespace popp\test\ch04;

use popp\test\BaseUnit;
use popp\ch04\batch24\Runner;

class Batch24Test extends BaseUnit
{
    public function testRunnerPrint()
    {
        $val = $this->capture(function() {
            Runner::run();
        });

        self::assertEquals("Bob 44\n", $val);
    }

    public function testRunnerWrite()
    {
        $path = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'logs' . DIRECTORY_SEPARATOR . 'person.log';

        if (file_exists($path)) {
            unlink($path);
        }

        $this->capture(function() {
            Runner::run2();
        });

        $val = file_get_contents($path);

        self::assertEquals("Bob 44\n", $val);
    }
}
