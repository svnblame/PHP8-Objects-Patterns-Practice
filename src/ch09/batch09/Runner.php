<?php declare(strict_types=1);

namespace popp\ch09\batch09;

class Runner {
    public static function run()
    {
        $manager = new MegaCommsManager();

        print $manager->getHeaderText();
        print $manager->getApptEncoder()->encode();
        print $manager->getFooterText();
    }
}