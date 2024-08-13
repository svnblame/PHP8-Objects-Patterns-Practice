<?php declare(strict_types=1);

namespace popp\ch09\batch03;

class WellConnected extends Employee
{
    /* listing 09.09 */
    public function fire(): void
    {
        print "{$this->name}: I'll call my dad\n";
    }
}
