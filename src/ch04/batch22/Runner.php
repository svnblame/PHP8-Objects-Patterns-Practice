<?php declare(strict_types=1);

namespace popp\ch04\batch22;

class Runner
{
    public static function run(): void
    {
        /* listing 04.106, page 140, Defining String Values for Your Objects */
        $st = new StringThing();
        print $st;
    }

    public static function run2(): void
    {
        /* listing 04.108, page 141, Defining String Values for Your Objects */
        $person = new Person();
        print $person;  // output: Bob (age 44)
    }

    public static function run3(): void
    {
        $person = new Person();
        self::printThing($person);
    }

    /* listing 04.109, page 142, Defining String Values for Your Objects */
    public static function printThing(string|\Stringable $str): void
    {
        print $str;
    }
}
