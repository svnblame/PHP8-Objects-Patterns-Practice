<?php declare(strict_types=1);

namespace popp\ch11\parse;

abstract class Expression {
    private static $keyCount = 0;
    private $key;

    abstract public function interpret(Context $context);

    public function getKey(): mixed
    {
        if (! isset($this->key)) {
            self::$keyCount++;
            $this->key = self::$keyCount;
        }

        return $this->key;
    }
}
