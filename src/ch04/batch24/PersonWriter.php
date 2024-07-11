<?php declare(strict_types=1);

namespace popp\ch04\batch24;

/* Anonymous Classes - listing 04.123, page 150 */
interface PersonWriter
{
    public function write(Person $person): void;
}
