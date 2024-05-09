<?php declare(strict_types=1);

namespace popp\ch04\batch20;

/* listing 04.99, page 138, Copying Objects with __clone() */
class Person
{
    private int $id = 0;

    public function __construct(private string $name, private int $age) {}

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function __clone(): void
    {
        $this->id = 0;
    }
}
