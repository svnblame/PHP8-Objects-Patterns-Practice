<?php declare(strict_types=1);

namespace popp\ch04\batch22;

/* listing 04.107, page 141, Defining String Values for Your Objects */
class Person
{
    public function getName(): string
    {
        return 'Bob';
    }

    public function getAge(): int{
        return 44;
    }

    public function __toString(): string
    {
        return "{$this->getName()} (age {$this->getAge()})";
    }
}