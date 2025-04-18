<?php declare(strict_types=1);

namespace popp\ch13\batch01;

/* listing 13.03 */

use popp\ch12\batch01\AppException;

class VenueMapper extends Mapper
{
    private \PDOStatement $selectStmt;
    private \PDOStatement $selectAllStmt;
    private \PDOStatement $updateStmt;
    private \PDOStatement $insertStmt;

    public function __construct()
    {
        parent::__construct();

        $this->selectStmt = $this->pdo->prepare(
            "SELECT * FROM venue WHERE id = ?"
        );

        $this->selectAllStmt = $this->pdo->prepare(
            "SELECT * FROM venue"
        );

        $this->updateStmt = $this->pdo->prepare(
            "UPDATE venue SET name = ?, id = ? WHERE id = ?"
        );

        $this->insertStmt = $this->pdo->prepare(
            "INSERT INTO venue (name) VALUES (?)"
        );
    }

    public function update(DomainObject $obj): void
    {
        $values = [
            $obj->name,
            $obj->getId(),
            $obj->getId(),
        ];

        $this->updateStmt->execute($values);
    }

    protected function selectStmt(): \PDOStatement
    {
        return $this->selectStmt;
    }

    protected function selectAllStmt(): \PDOStatement
    {
        return $this->selectAllStmt;
    }

    /**
     * @throws AppException
     */
    protected function getCollection(array $raw): VenueCollection
    {
        return new VenueCollection($raw, $this);
    }

    protected function doCreateObject(array $raw): Venue
    {
        $obj = new Venue(
            (int)$raw['id'],
            $raw['name'],
        );

        $spaceMapper = new SpaceMapper();
        $spaceCollection = $spaceMapper->findByVenue($raw['id']);
        $obj->setSpaces($spaceCollection);

        return $obj;
    }

    /* listing 13.06 */
    protected function doInsert(DomainObject $object): void
    {
        $values = [$object->name];
        $this->insertStmt->execute($values);
        $id = $this->pdo->lastInsertId();
        $object->setId((int)$id);
    }

    protected function targetClass(): string
    {
        return Venue::class;
    }
}