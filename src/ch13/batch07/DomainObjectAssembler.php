<?php declare(strict_types=1);

namespace popp\ch13\batch07;

use popp\ch13\batch04\Registry;
use popp\ch13\batch04\DomainObject;
use popp\ch13\batch05\Collection;

/* listing 13.51 */
class DomainObjectAssembler
{
    protected \PDO $pdo;
    protected array $statements = [];

    /**
     * @throws \Exception
     */
    public function __construct(private readonly PersistenceFactory $factory)
    {
        $reg = Registry::instance();
        $this->pdo = $reg->getPDO();
    }

    public function getStatement(string $str): \PDOStatement
    {
        if (! isset($this->statements[$str])) {
            $this->statements[$str] = $this->pdo->prepare($str);
        }

        return $this->statements[$str];
    }

    public function findOne(IdentityObject $idObj): DomainObject
    {
        $collection = $this->find($idObj);

        return $collection->next();
    }

    public function find(IdentityObject $idObj): Collection
    {
        $selFact = $this->factory->getSelectionFactory();
        [$selection, $values] = $selFact->newSelection($idObj);
        $stmt = $this->getStatement($selection);
        $stmt->execute($values);
        $raw = $stmt->fetchAll();

        return $this->factory->getCollection($raw);
    }

    public function insert(DomainObject $obj): void
    {
        $upFactory = $this->factory->getUpdateFactory();
        list($update, $values) = $upFactory->newUpdate($obj);
        $stmt = $this->getStatement($update);
        $stmt->execute($values);

        if ($obj->getId() < 0) {
            $obj->setId((int)$this->pdo->lastInsertId());
        }

        $obj->markClean();
    }
}
