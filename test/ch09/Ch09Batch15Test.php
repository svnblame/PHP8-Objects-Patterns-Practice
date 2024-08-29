<?php declare(strict_types = 1);

namespace popp\test\ch09;

use popp\ch09\batch15\ObjectAssembler;
use popp\test\BaseUnit;
use popp\ch09\batch15\Runner;
use popp\ch09\batch11\Sea;
use popp\ch09\batch11\Plains;
use popp\ch09\batch11\Forest;
use popp\ch09\batch11\EarthSea;
use popp\ch09\batch11\EarthPlains;
use popp\ch09\batch11\MarsPlains;
use popp\ch09\batch11\EarthForest;
use popp\ch09\batch11\MarsForest;


class Ch09Batch15Test extends BaseUnit {
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertEquals("Appointment data encoded in BloggsCal format\n", $val);
    }

    public function testNonArgInjection()
    {
        $assembler = new ObjectAssembler('src/ch09/batch15/objects.xml');

        $sea = $assembler->getComponent(Sea::class);
        self::assertTrue($sea instanceof EarthSea);

        $plains = $assembler->getComponent(Plains::class);
        self::assertTrue($plains instanceof MarsPlains);

        $forest = $assembler->getComponent(Forest::class);
        self::assertTrue($forest instanceof EarthForest);
    }
}
