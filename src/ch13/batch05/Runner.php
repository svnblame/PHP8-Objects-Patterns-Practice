<?php declare(strict_types=1);

namespace popp\ch13\batch05;

class Runner
{
    public static function run()
    {
        $factory = new VenueObjectFactory();

        $venue = $factory->createObject(
            [
                'id' => -1,
                'name' => 'The Venue'
            ]
        );

        print_r($venue);
    }
}
