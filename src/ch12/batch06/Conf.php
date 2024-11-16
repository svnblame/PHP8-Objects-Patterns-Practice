<?php declare(strict_types=1);

namespace popp\ch12\batch06;

class Conf {
    public function __construct(private array $vals = []) {}

    public function get(string $key): mixed
    {
        if (array_key_exists($key, $this->vals)) {
            return $this->vals[$key];
        }

        return null;
    }

    public function set(string $key, mixed $val): void
    {
        $this->vals[$key] = $val;
    }
}
