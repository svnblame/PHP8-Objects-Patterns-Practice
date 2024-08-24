<?php declare(strict_types=1);

namespace popp\ch09\batch10;

class Runner {
    public static function run(): void
    {
        $manager = new BloggsCommsManager();

        print $manager->getHeaderText();
        print $manager->make(CommsManager::APPT)->encode();
        print $manager->getFooterText();
    }
}