<?php declare(strict_types=1);

namespace popp\ch12\batch08;

use popp\ch12\batch06\Registry;

class Runner {
    public static function run(): void
    {
        include __DIR__ . "/addVenue.php";
    }

    public static function run2(): void
    {
        $registry = Registry::instance();
        $registry->reset();

        $_SERVER['argv'] = [];
        $_SERVER['argv'][] = 'submitted=yes';

        include(__DIR__ . '/addVenue.php');
    }

    public static function run3(): void
    {
        $registry = Registry::instance();
        $registry->reset();

        $_SERVER['argv'] = [];
        $_SERVER['argv'][] = 'submitted=yes';
        $_SERVER['argv'][] = 'venue_name=bob';
        include(__DIR__ . '/addVenue.php');
    }
}
