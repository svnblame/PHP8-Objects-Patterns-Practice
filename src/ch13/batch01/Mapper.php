<?php declare(strict_types=1);

namespace popp\ch13\batch01;

/* listing 13.01 & listing 13.02 */
abstract class Mapper
{
    protected \PDO $pdo;

    public function __construct()
    {
        $reg = Registry::instance();
        $this->pdo = $reg->getPdo();
    }

    public function find(int $id): ?DomainObject
    {
        $this->selectStmt()->execute([$id]);
        $row = $this->selectStmt()->fetch();
        $this->selectStmt()->closeCursor();

        if (! is_array($row)) return null;

        if (! isset($row['id'])) return null;

        return $this->createObject($row);
    }

    /* listing 13.15 */
    public function findAll(): Collection
    {
        $this->selectAllStmt()->execute();

        return $this->getCollection(
            $this->selectAllStmt()->fetchall()
        );
    }

    public function createObject(array $raw): DomainObject
    {
        return $this->doCreateObject($raw);
    }

    public function insert(DomainObject $obj): void
    {
        $this->doInsert($obj);
    }

    abstract public function update(DomainObject $obj): void;
    abstract protected function selectStmt(): \PDOStatement;
    abstract protected function selectAllStmt(): \PDOStatement;
    abstract protected function getCollection(array $raw): Collection;
    abstract protected function doCreateObject(array $raw): DomainObject;
    abstract protected function doInsert(DomainObject $object): void;
    abstract protected function targetClass(): string;
}
