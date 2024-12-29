<?php declare(strict_types=1);

namespace popp\ch13\batch01;

class Space extends DomainObject {
    public function __construct(int $id, private string $name, private ?Venue $venue = null)
    {
        parent::__construct($id);
    }

    public function setVenue(Venue $venue): void
    {
        $this->venue = $venue;
    }

    public function getVenue(): Venue
    {
        return $this->venue;
    }

    public function getFinder(): SpaceMapper
    {
        $registry = Registry::instance();
        return $registry->getSpaceMapper();
    }

    public function setName(string $name): void
    {
        $this->name = $name;
        $this->markDirty();
    }

    public function getName(): string
    {
        return $this->name;
    }
}
