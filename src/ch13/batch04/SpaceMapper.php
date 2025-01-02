<?php declare(strict_types=1);

namespace popp\ch13\batch04;

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
        // TODO: Implement selectAllStatement() method.
    }

    protected function getCollection(array $raw): Collection
    {
        return new SpaceCollection($raw, $this);
    }

    protected function update(DomainObject $object): void
    {
        // TODO: Implement update() method.
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

    protected function doInsert(DomainObject $object): void
    {
        // TODO: Implement doInsert() method.
    }

    protected function selectStatement(): \PDOStatement
    {
        // TODO: Implement selectStatement() method.
    }
}