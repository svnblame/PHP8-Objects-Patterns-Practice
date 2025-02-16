<?php declare(strict_types=1);

namespace popp\ch13\batch04;

use popp\ch13\batch01\AppException;

abstract class Collection implements \Iterator
{
    protected int $total = 0;
    private int $pointer = 0;
    private array $objects = [];

    /**
     * @throws AppException
     */
    public function __construct(protected array $raw = [], protected ?Mapper $mapper = null)
    {
        $this->total = count($raw);

        if (count($raw) && is_null($mapper)) {
            throw new AppException('Mapper required to generate objects.');
        }
    }

    /**
     * @throws AppException
     */
    public function add(DomainObject $object): void
    {
        $class = $this->targetClass();

        if (! ($object instanceof $class)) {
            throw new AppException('Object must be an instance of ' . $class);
        }

        $this->notifyAccess();
        $this->objects[$this->total] = $object;
        $this->total++;
    }

    abstract public function targetClass(): string;

    protected function notifyAccess(): void
    {
        // deliberately left blank!
    }

    private function getRow(int $num): ?DomainObject
    {
        $this->notifyAccess();

        if ($num >= $this->total || $num < 0) return null;

        if (isset($this->objects[$num])) {
            return $this->objects[$num];
        }

        if (isset($this->raw[$num])) {
            $this->objects[$num] = $this->mapper->createObject($this->raw[$num]);
            return $this->objects[$num];
        }

        return null;
    }

    /**
     * @inheritDoc
     */
    public function current(): mixed
    {
        return $this->getRow($this->pointer);
    }

    /**
     * @inheritDoc
     */
    public function next(): void
    {
        $row = $this->getRow($this->pointer);

        if (! is_null($row)) $this->pointer++;
    }

    /**
     * @inheritDoc
     */
    public function key(): mixed
    {
        return $this->pointer;
    }

    /**
     * @inheritDoc
     */
    public function valid(): bool
    {
        return (! is_null($this->current()));
    }

    /**
     * @inheritDoc
     */
    public function rewind(): void
    {
        $this->pointer = 0;
    }
}
