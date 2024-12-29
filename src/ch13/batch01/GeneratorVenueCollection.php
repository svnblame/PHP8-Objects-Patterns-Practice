<?php declare(strict_types=1);

namespace popp\ch13\batch01;

class GeneratorVenueCollection extends GeneratorCollection
{
    public function targetClass(): string
    {
        return Venue::class;
    }
}
