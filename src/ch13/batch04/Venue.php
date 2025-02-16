<?php declare(strict_types=1);

namespace popp\ch13\batch04;

class Venue extends DomainObject
{
    private ?SpaceCollection $spaces = null;

    public function __construct(int $id, private string $name)
    {
        parent::__construct($id);
    }

    public function getSpaces(): SpaceCollection
    {
        if (is_null($this->spaces)) {
            $registry = Registry::instance();
            $this->spaces = $registry->getSpaceCollection();
        }

        return $this->spaces;
    }

    public function setSpaces(SpaceCollection $spaces): void
    {
        $this->spaces = $spaces;
    }

    public function addSpace(Space $space): void
    {
        $this->getSpaces()->add($space);
        $space->setVenue($this);
    }

    public function getSpaces2(): SpaceCollection
    {
        if (is_null($this->spaces)) {
            $registry = Registry::instance();
            $finder = $registry->getSpaceMapper();
            $this->spaces = $finder->findByVenue($this->id);
        }

        return $this->spaces;
    }

    public function getFinder(): VenueMapper
    {
        $registry = Registry::instance();

        return $registry->getVenueMapper();
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
