<?php declare(strict_types=1);

namespace popp\ch13\batch05;

use popp\ch13\batch04\DomainObject;

/* listing 13.35 */
abstract class Collection implements \Iterator
{

    protected int $total = 0;
    protected array $raw = [];

    private int $pointer = 0;
    private array $objects = [];

    public function __construct(array $raw = [], protected ?DomainObjectFactory $factory = null)
    {
        if (count($raw) && ! is_null($factory)) {
            $this->raw = $raw;
            $this->total = count($raw);
        }

        $this->factory = $factory;
    }

    public function add(DomainObject $object): void
    {
        $class = $this->targetClass();

        if (! ($object instanceof $class)) {
            throw new Exception("This is a {$class} collection");
        }

        $this->notifyAccess();
        $this->objects[$this->total] = $object;
        $this->total++;
    }

    abstract public function targetClass(): string;

    protected function notifyAccess(): void
    {
        // deliberately left blank
    }

    /* listing 13.36 */
    private function getRow(int $num): ?DomainObject
    {
        $this->notifyAccess();

        if ($num >= $this->total || $num < 0) {
            return null;
        }

        if (isset($this->objects[$num])) {
            return $this->objects[$num];
        }

        if (isset($this->raw[$num])) {
            $this->objects[$num] = $this->factory->createObject($this->raw[$num]);
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
        if ($row) {
            $this->pointer++;
        }
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