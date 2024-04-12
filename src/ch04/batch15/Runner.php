<?php declare(strict_types=1);

namespace popp\ch04\batch15;

class Runner 
{
    /* listing 04.82, page 137 */
    /* Working with Interceptors (aka overloading, magic methods) */
    public static function run()
    {
        $p = new Person();
        print $p->name . ", " . $p->age;
    }

    public static function run2() 
    {
        $p = new Person();
        if (isset($p->name) && isset($p->age)) {
            print $p->name . ", " . $p->age;
        }
    }
}