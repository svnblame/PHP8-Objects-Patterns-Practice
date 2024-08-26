<?php declare(strict_types = 1);

namespace popp\test\ch09;

use popp\ch09\batch14\ObjectAssembler;
use popp\test\BaseUnit;
use popp\ch09\batch14\Runner;
use popp\ch09\batch06\BloggsApptEncoder;
use popp\ch09\batch11\TerrainFactory;
use popp\ch09\batch11\EarthSea;
use popp\ch09\batch11\MarsPlains;
use popp\ch09\batch11\Forest;
use popp\ch09\batch11\EarthForest;
use popp\ch09\batch14\AppointmentMaker2;

class Ch09Batch14Test extends BaseUnit {
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertEquals("Appointment data encoded in BloggsCal format\n", $val);
    }

    public function testAssembler()
    {
        $assembler = new ObjectAssembler('src/ch09/batch14/objects.xml');
        $component = $assembler->getComponent(TerrainFactory::class);

        self::assertTrue($component->getSea() instanceof EarthSea);
        self::assertTrue($component->getPlains() instanceof MarsPlains);
        self::assertTrue($component->getForest() instanceof EarthForest);

        $apptMaker = $assembler->getComponent(AppointmentMaker2::class);
        $expected = $apptMaker->makeAppointment();
        self::assertEquals("Appointment data encoded in BloggsCal format\n", $expected);
    }
}
