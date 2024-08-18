<?php declare(strict_types=1);

namespace popp\ch09\batch05;

class Runner
{
    public static function run(): void
    {
        $pref = Preferences::getInstance();
        print $pref->getDsn();

        Preferences::mockMode();
        $pref = Preferences::getInstance();
        print $pref->getDsn();
    }
}
