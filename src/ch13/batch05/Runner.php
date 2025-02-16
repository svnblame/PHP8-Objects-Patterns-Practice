<?php declare(strict_types=1);

namespace popp\ch13\batch05;

class Runner
{
    public static function run(): void
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

    public static function run2(): array
    {
        $raw = [
            [
                'id' => -1,
                'name' => 'The Venue'
            ],
            [
                'id' => -2,
                'name' => 'The Other Venue'
            ]
        ];

        $collection = new VenueCollection($raw, new VenueObjectFactory());
        $return = [];
        foreach ($collection as $venue) {
            $return[] = $venue->getName();
        }

        return $return;
    }
}
