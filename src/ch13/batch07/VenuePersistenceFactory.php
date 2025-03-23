<?php declare(strict_types=1);

namespace popp\ch13\batch07;

use popp\ch13\batch04\VenueMapper;
use popp\ch13\batch05\Collection;
use popp\ch13\batch05\VenueCollection;
use popp\ch13\batch05\DomainObjectFactory;
use popp\ch13\batch05\VenueObjectFactory;

class VenuePersistenceFactory extends PersistenceFactory
{
    public function getMapper(): VenueMapper
    {
        return new VenueMapper();
    }

    public function getDomainObjectFactory(): DomainObjectFactory
    {
        return new VenueObjectFactory();
    }

    public function getCollection(array $array): VenueCollection
    {
        return new VenueCollection($array, $this->getDomainObjectFactory());
    }

    public function getSelectionFactory(): SelectionFactory
    {
        return new VenueSelectionFactory();
    }

    public function getUpdateFactory(): UpdateFactory
    {
        return new VenueUpdateFactory();
    }

    public function getIdentityObject(): VenueIdentityObject
    {
        return new VenueIdentityObject();
    }
}
