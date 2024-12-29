<?php declare(strict_types=1);

namespace popp\ch13\batch01;

use popp\ch12\batch01\AppException;

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

        /* listing 13.16 */
        $this->selectAllStatement = $this->pdo->prepare(
            "SELECT * FROM space"
        );

        $this->findByVenueStatement = $this->pdo->prepare(
            "SELECT * FROM space WHERE venue=?"
        );
    }

    public function update(DomainObject $object): void
    {
        $values = [
            $object->getName(),
            $object->getId(),
            $object->getId()
        ];

        $this->updateStatement->execute($values);
    }

    protected function selectStmt(): \PDOStatement
    {
        return $this->selectStatement;
    }

    protected function selectAllStmt(): \PDOStatement
    {
        return $this->selectAllStatement;
    }

    /**
     * listing 13.17
     * @throws AppException
     */
    protected function getCollection(array $raw): Collection
    {
        return new SpaceCollection($raw, $this);
    }

    protected function doCreateObject(array $raw): DomainObject
    {
        $object = new Space(
            (int) $raw['id'],
            $raw['name']
        );

        $venueMapper = new VenueMapper();
        $venue = $venueMapper->find((int) $raw['venue']);
        $object->setVenue($venue);

        return $object;
    }

    /**
     * @throws AppException
     */
    protected function doInsert(DomainObject $object): void
    {
        $venue = $object->getVenue();

        if (! $venue) {
            throw new AppException("Venue not provided");
        }

        $values = [$object->getName(), $venue->getId()];
        $this->insertStatement->execute($values);
        $id = $this->pdo->lastInsertId();
        $object->setId((int)$id);
    }

    /* listing 13.23 */
    protected function targetClass(): string
    {
        return Space::class;
    }

    /* listing 13.18 */
    /**
     * @throws AppException
     */
    public function findByVenue($vid): SpaceCollection
    {
        $this->findByVenueStatement->execute([$vid]);

        return new SpaceCollection($this->findByVenueStatement->fetchAll(), $this);
    }
}