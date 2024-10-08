<?php declare(strict_types=1);

namespace popp\ch04\batch24;

/* Anonymous Classes - listing 04.124, page 150 */
class Person
{
    public function output(PersonWriter $writer): void
    {
        $writer->write($this);
    }

    public function getName(): string
    {
        return "Bob";
    }

    public function getAge(): int
    {
        return 44;
    }
}
