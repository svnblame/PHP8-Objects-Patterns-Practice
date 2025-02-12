<?php

namespace popp\ch13\batch05;

use popp\ch13\batch04\Venue;
use popp\ch13\batch04\DomainObject;

/* listing 13.34 */
class VenueObjectFactory extends DomainObjectFactory
{
    public function createObject(array $row): DomainObject
    {
        $old = $this->getFromMap(Venue::class, $row['id']);

        if ($old) {
            return $old;
        }

        $obj = new Venue((int) $row['id'], $row['name']);

        $this->addToMap($obj);

        return $obj;
    }
}
