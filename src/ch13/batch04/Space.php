<?php declare(strict_types=1);

namespace popp\ch13\batch04;

class Space extends DomainObject
{
    private ?EventCollection $events = null;

    public function __construct(int $id, private string $name, private ?Venue $venue = null)
    {
        $this->name = $name;
        parent::__construct($id);
        $this->venue = $venue;
    }

    /* listing 13.27 */
    public function setVenue(Venue $venue): void
    {
        $this->venue = $venue;
        $this->markDirty();
    }

    public function setName(string $name): void
    {
        $this->name = $name;
        $this->markDirty();
    }

    public function setEvents(EventCollection $collection): void
    {
        $this->events = $collection;
    }

    public function getEvents(): EventCollection
    {
        return $this->events;
    }

    /* listing 13.30 */
    public function getEvents2(): EventCollection
    {
        if (is_null($this->events)) {
            $registry = Registry::instance();
            $eventMapper = $registry->getEventMapper();
            $this->events = $eventMapper->findbySpaceId($this->getId());
        }

        return $this->events;
    }

    public function forgetEvents(): void
    {
        $this->events = null;
    }

    public function getVenue(): ?Venue
    {
        return $this->venue;
    }

    public function getFinder(): SpaceMapper
    {
        $registry = Registry::instance();
        return $registry->getSpaceMapper();
    }

    public function getName(): string
    {
        return $this->name;
    }
}
