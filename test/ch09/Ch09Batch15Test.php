<?php declare(strict_types = 1);

namespace popp\ch09;

use popp\ch09\batch14\AppointmentMaker;
use popp\ch09\batch15\AppointmentMaker2;
use popp\ch09\batch15\ObjectAssembler;
use popp\ch09\batch15\TerrainFactory;
use popp\BaseUnit;
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

        $apptMaker = $assembler->getComponent(AppointmentMaker::class);
        self::assertInstanceOf(AppointmentMaker::class, $apptMaker);
    }

    public function testNoArgsDefinedInstance()
    {
        $assembler = new ObjectAssembler('src/ch09/batch15/objects.xml');

        $sea = $assembler->getComponent(Sea::class);
        self::assertInstanceOf(EarthSea::class, $sea);

        $plains = $assembler->getComponent(Plains::class);
        self::assertInstanceOf(MarsPlains::class, $plains);

        $forest = $assembler->getComponent(Forest::class);
        self::assertInstanceOf(EarthForest::class, $forest);
    }

    public function testAttributeConstructor()
    {
        $assembler = new ObjectAssembler('src/ch09/batch15/objects.xml');
        $terrainFactory = $assembler->getComponent(TerrainFactory::class);

        self::assertInstanceOf(EarthSea::class, $terrainFactory->getSea());
        self::assertInstanceOf(MarsPlains::class, $terrainFactory->getPlains());
        self::assertInstanceOf(EarthForest::class, $terrainFactory->getForest());
    }

    public function testAttributeSetter()
    {
        $assembler = new ObjectAssembler('src/ch09/batch15/objects.xml');
        $apptMaker = $assembler->getComponent(AppointmentMaker::class);

        self::assertEquals("Appointment data encoded in BloggsCal format\n", $apptMaker->makeAppointment());
    }

    public function testAttributeSetterRunner()
    {
        $val = $this->capture(function() { Runner::run3(); });
        self::assertEquals("Appointment data encoded in BloggsCal format\n", $val);
    }

    public function testDefinedNoArgsNoInstance()
    {
        $assembler = new ObjectAssembler('src/ch09/batch15/objects.xml');
        $apptMaker = $assembler->getComponent(AppointmentMaker2::class);
        self::assertEquals("Appointment data encoded in BloggsCal format\n", $apptMaker->makeAppointment());
    }
}
