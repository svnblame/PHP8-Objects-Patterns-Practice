<?php

namespace popp\ch12\batch07;

// fake mapper
class VenueMapper {
    private array $fakeVenues = [
        'Likey Lounge',
        'Happy House'
    ];

    public function findAll(): array
    {
        $return = [];

        foreach ($this->fakeVenues as $venue) {
            $return[] = new Venue($venue);
        }

        return $return;
    }
}
