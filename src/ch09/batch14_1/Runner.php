<?php declare(strict_types=1);

namespace popp\ch09\batch14_1;

use popp\ch09\batch06\ApptEncoder;
use popp\ch09\batch06\BloggsApptEncoder;
use popp\ch09\batch06\MegaApptEncoder;

class Runner {
    public static function run()
    {
        /* listing 09.55 */
        $assembler = new ObjectAssembler("src/ch09/batch14_1/objects.xml");
        $encoder = $assembler->getComponent(ApptEncoder::class);
        $apptMaker = new AppointmentMaker2($encoder);
        print $apptMaker->makeAppointment();
    }
}
