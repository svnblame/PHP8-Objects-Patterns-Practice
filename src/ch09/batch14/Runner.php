<?php declare(strict_types=1);

namespace popp\ch09\batch14;

class Runner {
    public static function run()
    {
        /* listing 09.61 */
        $assembler = new ObjectAssembler('src/ch09/batch14/objects.xml');
        $apptMaker = $assembler->getComponent(AppointmentMaker2::class);

        print $apptMaker->makeAppointment();
    }
}
