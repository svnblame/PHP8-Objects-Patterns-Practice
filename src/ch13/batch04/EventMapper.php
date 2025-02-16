<?php declare(strict_types = 1);

namespace popp\ch13\batch04;

use popp\ch13\batch01\AppException;

class EventMapper extends Mapper
{
    private \PDOStatement $selectStatement;
    private \PDOStatement $selectAllStatement;
    private \PDOStatement $updateStatement;
    private \PDOStatement $insertStatement;
    private \PDOStatement $selectBySpaceStatement;

    public function __construct()
    {
        parent::__construct();

        $this->selectAllStatement = $this->pdo->prepare(
            "SELECT * FROM event"
        );

        $this->selectBySpaceStatement = $this->pdo->prepare(
            "SELECT * FROM event WHERE space=?"
        );

        $this->selectStatement = $this->pdo->prepare(
            "SELECT * FROM event WHERE id=?"
        );

        $this->updateStatement = $this->pdo->prepare(
            "UPDATE event SET start=?, duration=?, name=?, id=? WHERE id=?"
        );

        $this->insertStatement = $this->pdo->prepare(
            "INSERT INTO event (start, duration, space, name) VALUES (?, ?, ?, ?)"
        );
    }

    protected function selectAllStatement(): \PDOStatement
    {
        return $this->selectAllStatement;
    }

    protected function getCollection(array $raw): Collection
    {
        return new EventCollection($raw, $this);
    }

    protected function update(DomainObject $object): void
    {
        $values = [
            $object->getStart(),
            $object->getDuration(),
            $object->getName(),
            $object->getId(),
            $object->getId()
        ];

        $this->updateStatement->execute($values);
    }

    protected function doCreateObject(array $raw): DomainObject
    {
        $spaceMapper = new SpaceMapper();
        $space = $spaceMapper->find((int)$raw['space']);

        return new Event((int)$raw['id'], $raw['name'], (int)$raw['start'], (int)$raw['duration'], $space);
    }

    /**
     * @throws AppException
     */
    protected function doInsert(DomainObject $object): void
    {
        $space = $object->getSpace();

        if (! $space) {
            throw new AppException("Space not provided");
        }

        $values = [
            $object->getStart(),
            $object->getDuration(),
            $object->getId(),
            $object->getName()
        ];

        $this->insertStatement->execute($values);
        $id = $this->pdo->lastInsertId();
        $object->setId((int)$id);
    }

    protected function selectStatement(): \PDOStatement
    {
        return $this->selectStatement;
    }

    /* listing 13.32 */
    public function findBySpaceId(int $sid): DeferredEventCollection
    {
        return new DeferredEventCollection(
            $this,
            $this->selectBySpaceStatement,
            [$sid]
        );
    }

    protected function targetClasses(): string
    {
        return Event::class;
    }
}