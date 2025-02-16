<?php declare(strict_types=1);

namespace popp\ch13\batch05;

use popp\ch13\batch04\Venue;

class VenueCollection extends Collection
{
    public function targetClass(): string
    {
        return Venue::class;
    }
}
