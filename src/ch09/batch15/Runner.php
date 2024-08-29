<?php declare(strict_types=1);

namespace popp\ch09\batch15;

class Runner {
    public static function run()
    {
        $assembler = new ObjectAssembler('src/ch09/batch15/objects.xml');
        $apptMaker = $assembler->getComponent(AppointmentMaker2::class);
        print $apptMaker->makeAppointment();
    }
}
