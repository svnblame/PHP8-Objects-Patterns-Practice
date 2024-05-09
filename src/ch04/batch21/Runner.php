<?php declare(strict_types=1);

namespace popp\ch04\batch21;

class Runner
{
    /* listing 04.103, page 139, Copying Objects with __clone() */
    public static function run(): void
    {
        $person = new Person('bob', 44, new Account(200));
        $person->setId(343);
        $person2 = clone $person;

        // give $person some money
        $person->account->balance += 10;
        // $person2 sees the credit too
        print $person2->account->balance; // output: 210
    }

    public static function run2(): void
    {
        $person = new ShallowPerson('bob', 44, new Account(200));
        $person->setId(343);
        $person2 = clone $person;

        // give $person some money
        $person->account->balance += 10;

        // $person2 should NOT see the credit too
        print $person2->account->balance; // output: 200
    }
}