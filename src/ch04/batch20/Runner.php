<?php declare(strict_types=1);

namespace popp\ch04\batch20;

class Runner
{
    public static function run()
    {
        /* listing 04.100, page 138, Copying Objects with __clone() */
        $person = new Person('bob', 44);
        $person->setId(343);
        $person2 = clone $person;

        return [$person, $person2];
    }
}