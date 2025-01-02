<?php declare(strict_types=1);

namespace popp\ch13\batch04;

abstract class Mapper {
    protected \PDO $pdo;

    /**
     * @throws \Exception
     */
    public function __construct()
    {
        $registry = Registry::instance();
        $this->pdo = $registry->getPDO();
    }

    public function find(int $id): ?DomainObject
    {
        $old = $this->getFromMap($id);

        if (! is_null($old)) return $old;

        $this->selectStatement->execute([$id]);
        $raw = $this->selectStatement()->fetch();
        $this->selectStatement()->closeCursor();

        if (! is_array($raw) || ! isset($raw['id'])) return null;

        return $this->createObject($raw);
    }

    private function getFromMap(int $id): ?DomainObject
    {
        return ObjectWatcher::exists(
            $this->targetClass(),
            $id
        );
    }

    private function addToMap(DomainObject $object): DomainObject
    {
        return ObjectWatcher::add($object);
    }

    /* listing 13.26 */
    public function createObject(array $raw): DomainObject
    {
        $old = $this->getFromMap($raw['id']);

        if (! is_null($old)) return $old;

        $object = $this->doObjectCreate($raw);
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
            $this->selectAllStatement()->fechtAll()
        );
    }

    abstract protected function selectAllStatement(): \PDOStatement;
    abstract protected function getCollection(array $raw): Collection;
    abstract protected function update(DomainObject $object): void;
    abstract protected function doCreateObject(array $raw): DomainObject;
    abstract protected function doInsert(DomainObject $object): void;
    abstract protected function selectStatement(): \PDOStatement;
}
