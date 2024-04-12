<?php declare(strict_types=1);

namespace popp\ch04\batch19;

class Runner
{
    public static function run()
    {
        /* listing 04.90, page 132 */
        /* Working with Interceptors (aka overloading, magic methods) */
        $person = new Person("bob", 44);
        $person->setId(343);
       unset($person);
    }

    public static function run2()
    {
        /* listing 04.97, page 136 */
        /* Copying objects with __clone() */
        $first = new CopyMe();
        $second = $first;

        // PHP 4: $second and $first are 2 distinct objects
        // PHP 5 plus: $second and $first refer to one (same) object
        return [$first, $second];
    }

    public static function run3()
    {
        /* listing 04.98, page 137 */
        /* Copying objects with __clone() */
        $first = new CopyMe();
        $second = clone $first;

        // PHP 5 plus: $second and $first are 2 distinct (different) objects
        return [$first, $second];
    }
}
