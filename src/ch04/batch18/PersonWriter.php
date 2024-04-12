<?php declare(strict_types=1);

namespace popp\ch04\batch18;

/* listing 04.88, page 130 */
 /* Working with Interceptors (aka overloading, magic methods) */
 class PersonWriter
 {
    public function writeName(Person $p): void 
    {
        print $p->getName() . "\n";
    }

    public function writeAge(Person $p): void 
    {
        print $p->getAge() . "\n";
    }
 }