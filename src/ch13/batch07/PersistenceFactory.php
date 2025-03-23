<?php declare(strict_types=1);

namespace popp\ch13\batch07;

use popp\ch13\batch04\Event;
use popp\ch13\batch04\Mapper;
use popp\ch13\batch04\Space;
use popp\ch13\batch04\Venue;
use popp\ch13\batch05\DomainObjectFactory;
use popp\ch13\batch05\Collection;

abstract class PersistenceFactory
{
    abstract public function getMapper(): Mapper;
    abstract public function getDomainObjectFactory(): DomainObjectFactory;
    abstract public function getCollection(array $array): Collection;
    abstract public function getSelectionFactory(): SelectionFactory;
    abstract public function getUpdateFactory(): UpdateFactory;

    /**
     * @throws \Exception
     */
    public static function getFactory($target_class): PersistenceFactory
    {
        return match ($target_class) {
            Venue::class => new VenuePersistenceFactory(),
            Event::class => new EventPersistenceFactory(),
            Space::class => new SpacePersistenceFactory(),
            default => throw new \Exception('Unexpected value'),
        };
    }
}
