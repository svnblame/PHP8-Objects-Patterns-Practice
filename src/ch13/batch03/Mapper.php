<?php declare(strict_types=1);

namespace popp\ch13\batch03;

use popp\ch13\batch01\Collection;
use popp\ch13\batch01\DomainObject;
use popp\ch13\batch01\Registry;

abstract class Mapper {
    protected \PDO $pdo;

    public function __construct()
    {
        $registry = Registry::instance();
        $this->pdo = $registry->getPdo();
    }

    /* listing 13.22 */
    public function find(int $id): ?DomainObject
    {
        $old = $this->getFromMap($id);

        if (! is_null($old)) return $old;

        // work with DB
        $this->selectStatement()->execute([$id]);
        $raw = $this->selectStatement()->fetch();
        $this->selectStatement()->closeCursor();

        if (! is_array($raw)) return null;

        if (! isset($raw['id'])) return null;

        return $this->createObject($raw);
    }

    abstract protected function targetClass(): string;

    private function getFromMap(int $id): ?DomainObject
    {
        return ObjectWatcher::exists(
            $this->targetClass(),
            $id
        );
    }

    private function addToMap(DomainObject $object): void
    {
        ObjectWatcher::add($object);
    }

    public function createObject(array $raw): ?DomainObject
    {
        $old = $this->getFromMap((int)$raw['id']);

        if (! is_null($old)) return $old;

        $object = $this->doCreateObject($raw);
        $this->addToMap($object);

        return $object;
    }

    public function insert(DomainObject $object): void
    {
        $this->doInsert($object);
        $this->addToMap($object);
    }

    public function findAll(): Collection
    {
        $this->selectAllStatement()->execute([]);

        return $this->getCollection(
            $this->selectAllStatement()->fetchAll()
        );
    }

    abstract protected function selectAllStatement(): \PDOStatement;
    abstract protected function getCollection(array $raw): Collection;
    abstract protected function update(DomainObject $object): void;
    abstract protected function doCreateObject(array $raw): DomainObject;
    abstract protected function doInsert(DomainObject $object): void;
    abstract protected function selectStatement(): \PDOStatement;
}
