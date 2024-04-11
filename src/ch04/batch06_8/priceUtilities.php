<?php declare(strict_types=1);

namespace popp\ch04\batch06_8;

/* listing 04.45, page 103 */
/* Defining abstract methods in traits */
trait PriceUtilities 
{
    public function calculateTax(float $price): float 
    {
        // better design... we know getTaxRate() is implemented
        return (($this->getTaxRate() / 100) * $price);
    }

    abstract public function getTaxRate(): float;

    // other utilities ...
}