<?php declare(strict_types=1);

namespace popp\ch18\batch03;

class Person
{
    public function __construct(
        public string $name,
        public int $age,
        public ?string $address = null
    ) {}
}

$person = new Person('Gene Kelley', 59, '422 West Franklin St.');

print_r($person);
