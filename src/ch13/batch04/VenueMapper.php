<?php declare(strict_types=1);

namespace popp\ch13\batch04;

class VenueMapper extends Mapper
{
    private \PDOStatement $selectStatement;
    private \PDOStatement $selectAllStatement;
    private \PDOStatement $updateStatement;
    private \PDOStatement $insertStatement;

    public function __construct()
    {
        parent::__construct();

        $this->selectStatement = $this->pdo->prepare(
            "SELECT * FROM venue WHERE id = ?"
        );

        $this->selectAllStatement = $this->pdo->prepare(
            "SELECT * FROM venue"
        );

        $this->updateStatement = $this->pdo->prepare(
            "UPDATE venue SET name = ?, id = ? WHERE id = ?"
        );

        $this->insertStatement = $this->pdo->prepare(
            "INSERT INTO venue (name) VALUES (?)"
        );
    }

    protected function targetClass(): string
    {
        return Venue::class;
    }

    public function getCollection(array $raw): VenueCollection
    {
        return new VenueCollection($raw, $this);
    }

    protected function selectAllStatement(): \PDOStatement
    {
        return $this->selectAllStatement;
    }

    public function update(DomainObject $object): void
    {
       $values = [$object->getName(), $object->getId(), $object->getId()];
       $this->updateStatement->execute($values);
    }

    protected function doCreateObject(array $raw): Venue
    {
        $object = new Venue((int)$raw['id'], $raw['name']);
        $spaceMapper = new SpaceMapper();
        $spaceCollection = $spaceMapper->findByVenue($raw['id']);
        $object->setSpaces($spaceCollection);

        return $object;
    }

    protected function doInsert(DomainObject $object): void
    {
        $values = [$object->getName()];
        $this->insertStatement->execute($values);
        $id = $this->pdo->lastInsertId();
        $object->setId((int)$id);
    }

    protected function selectStatement(): \PDOStatement
    {
        return $this->selectStatement;
    }
}