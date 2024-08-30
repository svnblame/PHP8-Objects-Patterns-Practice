<?php declare(strict_types=1);

namespace popp\ch09\batch15;

class Runner {
    public static function run(): void
    {
        $assembler = new ObjectAssembler('src/ch09/batch15/objects.xml');
        $apptMaker = $assembler->getComponent(AppointmentMaker2::class);
        print $apptMaker->makeAppointment();
    }

    public static function run2(): void
    {
        /* listing 09.67 */
        $assembler = new ObjectAssembler('src/ch09/batch15/objects.xml');
        $terrainFactory = $assembler->getComponent(TerrainFactory::class);
        $plains = $terrainFactory->getPlains(); // MarsPlains
    }

    public static function run3(): void
    {
        /* listing 09.71 */
        $assembler = new ObjectAssembler('src/ch09/batch15/objects.xml');
        $apptMaker = $assembler->getComponent(AppointmentMaker::class);
        print $apptMaker->makeAppointment();
    }
}
