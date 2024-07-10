<?php declare(strict_types=1);

namespace popp\ch04\batch23;

class Product
{
    /* listing 04.110, page 142 */
    public function __construct(public string $name, public float $price) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    { return $this->price;}
}
