<?php declare(strict_types=1);

namespace popp\ch09\batch02;

class CluedUp extends Employee
{
    /* listing 09.06 */
    public function fire(): void
    {
        print "{$this->name}: I'll call my lawyer\n";
    }
}