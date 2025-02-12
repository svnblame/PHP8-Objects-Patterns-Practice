<?php declare(strict_types=1);

namespace popp\ch13\batch04;

use popp\ch13\batch01\AppException;

class SpaceMapper extends Mapper
{
    private \PDOStatement $selectStatement;
    private \PDOStatement $selectAllStatement;
    private \PDOStatement $updateStatement;
    private \PDOStatement $insertStatement;
    private \PDOStatement $findByVenueStatement;

    public function __construct()
    {
        parent::__construct();

        $this->selectStatement = $this->pdo->prepare(
            "SELECT * FROM space WHERE id=?"
        );

        $this->updateStatement = $this->pdo->prepare(
            "UPDATE space SET name=?, id=? WHERE id=?"
        );

        $this->insertStatement = $this->pdo->prepare(
            "INSERT INTO space (name, venue) VALUES (?, ?)"
        );

        $this->selectAllStatement = $this->pdo->prepare(
            "SELECT * FROM space"
        );

        $this->findByVenueStatement = $this->pdo->prepare(
            "SELECT * FROM space WHERE venue=?"
        );
    }

    protected function selectAllStatement(): \PDOStatement
    {
        return $this->selectAllStatement;
    }

    /**
     * @throws AppException
     */
    protected function getCollection(array $raw): Collection
    {
        return new SpaceCollection($raw, $this);
    }

    protected function update(DomainObject $object): void
    {
        $values = [$object->getName(), $object->getId(), $object->getId()];
        $this->updateStatement->execute($values);
    }

    /* listing 13.29 */
    protected function doCreateObject(array $raw): DomainObject
    {
        $object = new Space((int)$raw['id'], $raw['name']);
        $venueMapper = new VenueMapper();
        $venue = $venueMapper->find((int)$raw['venue']);
        $object->setVenue($venue);

        $eventMapper = new EventMapper();
        $eventCollection = $eventMapper->findBySpaceId((int)$raw['id']);
        $object->setEvents($eventCollection);

        return $object;
    }

    protected function targetClass(): string
    {
        return Space::class;
    }

    /**
     * @throws AppException
     */
    protected function doInsert(DomainObject $object): void
    {
        $venue = $object->getVenue();

        if (! $venue) {
            throw new AppException("Cannot save without Venue");
        }

        $values = [ $object->getName(), $venue->getId() ];
        $this->insertStatement->execute($values);
        $id = $this->pdo->lastInsertId();
        $object->setId((int)$id);
    }

    protected function selectStatement(): \PDOStatement
    {
        return $this->selectStatement;
    }

    /**
     * @throws AppException
     */
    public function findByVenue($vid): SpaceCollection
    {
        $this->findByVenueStatement->execute([$vid]);

        return new SpaceCollection($this->findByVenueStatement->fetchAll(), $this);
    }
}
