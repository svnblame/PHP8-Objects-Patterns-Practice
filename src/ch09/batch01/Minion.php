<?php declare(strict_types=1);

namespace popp\ch09\batch01;

class Minion extends Employee
{
    /* listing 09.02 */
    public function fire(): void
    {
        print "{$this->name}: I'll clear my desk\n";
    }
}
