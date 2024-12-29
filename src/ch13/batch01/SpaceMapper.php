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

    public function update(DomainObject $obj): void
    {
        // TODO: Implement update() method.
    }

    protected function selectStmt(): \PDOStatement
    {
        // TODO: Implement selectStmt() method.
    }

    protected function selectAllStmt(): \PDOStatement
    {
        // TODO: Implement selectAllStmt() method.
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
        // TODO: Implement doCreateObject() method.
    }

    protected function doInsert(DomainObject $object): void
    {
        // TODO: Implement doInsert() method.
    }

    protected function targetClass(): string
    {
        // TODO: Implement targetClass() method.
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