<?php declare(strict_types=1);

namespace popp\ch12\batch10;

class Runner {
    public static function run()
    {
        $table = new TableCreator();
        $table->createTables();

        $halfHour = (60 * 30);
        $hour     = (60 * 60);
        $day      = (24 * $hour);

        $manager = new VenueManager();

        $results = $manager->addVenue(
            'The Eyeball Inn',
            ['The Room Upstairs', 'Main Bar']
        );

        $space_id = $results['spaces'][0][0];

        $manager->bookEvent((int) $space_id, 'Running like the rain', time() + ($day), ($hour - 5));
        $manager->bookEvent((int) $space_id, 'Running like the trees', time() + ($day - $hour), $hour);
    }
}
