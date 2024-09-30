<?php declare(strict_types=1);

namespace popp\ch11\parse;

class Context {
    private array $expressionStore = [];

    public function replace(Expression $expression, $value): void
    {
        $this->expressionStore[$expression->getKey()] = $value;
    }

    public function lookup(Expression $expression)
    {
        return $this->expressionStore[$expression->getKey()];
    }
}
