<?php declare(strict_types=1);

namespace popp\ch13\batch04;

/* listing 13.31 */
class DeferredEventCollection extends EventCollection {
    private bool $run = false;

    public function __construct(
        Mapper $mapper,
        private \PDOStatement $statement,
        private array $valueArray
    ) {
        parent::__construct([], $mapper);
    }

    protected function notifyAccess(): void
    {
        if (! $this->run) {
            $this->statement->execute($this->valueArray);
            $this->raw = $this->statement->fetchAll();
            $this->total = count($this->raw);
        }

        $this->run = true;
    }
}
