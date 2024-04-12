<?php declare(strict_types=1);

namespace popp\ch04\batch18;

class Runner 
{
    public static function run() 
    {
        /* listing 04.90, page 132 */
        /* Working with Interceptors (aka overloading, magic methods) */
        $person = new Person(new PersonWriter());
        $person->writeName();
        $person->writeAge();
    }
}