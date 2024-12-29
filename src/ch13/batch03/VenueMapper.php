<?php declare(strict_types=1);

namespace popp\ch13\batch03;

use popp\ch12\batch01\AppException;
use popp\ch13\batch01\Venue;
use popp\ch13\batch01\Collection;
use popp\ch13\batch01\VenueCollection;
use popp\ch13\batch03\Mapper;
use popp\ch13\batch01\DomainObject;
use popp\ch13\batch01\SpaceMapper;

class VenueMapper extends Mapper
{
    private \PDOStatement $selectStatement;
    private \PDOStatement $selectAllStatement;
    private \PDOStatement $insertStatement;
    private \PDOStatement $updateStatement;

    public function __construct()
    {
        parent::__construct();

        $this->selectStatement = $this->pdo->prepare(
            "SELECT * FROM `venue`"
        );

        $this->selectAllStatement = $this->pdo->prepare(
            "SELECT * FROM `venue`"
        );

        $this->updateStatement = $this->pdo->prepare(
            "UPDATE `venue` SET `name`=?, `id`=? WHERE `id`=?"
        );

        $this->insertStatement = $this->pdo->prepare(
            "INSERT INTO `venue` ( `name` ) VALUES ( ? )"
        );
    }

    protected function targetClass(): string
    {
        return Venue::class;
    }

    protected function selectAllStatement(): \PDOStatement
    {
        return $this->selectStatement;
    }

    /**
     * @throws AppException
     */
    protected function getCollection(array $raw): Collection
    {
        return new VenueCollection($raw, $this);
    }

    protected function update(DomainObject $object): void
    {
        $values = [
            $object->name,
            $object->getId(),
            $object->getId()
        ];
        $this->updateStatement->execute($values);
    }

    protected function doCreateObject(array $raw): DomainObject
    {
        $object = new Venue((int)$raw['id'], $raw['name']);
        $spaceMapper = new SpaceMapper();
        $spaceCollection = $spaceMapper->findByVenue($raw['id']);
        $object->setSpaces($spaceCollection);

        return $object;
    }

    protected function doInsert(DomainObject $object): void
    {
        $values = [$object->name];
        $this->insertStatement->execute($values);
        $id = $this->pdo->lastInsertId();
        $object->setId((int)$id);
    }

    protected function selectStatement(): \PDOStatement
    {
        return $this->selectStatement;
    }
}
