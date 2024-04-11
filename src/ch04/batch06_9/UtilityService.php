<?php declare(strict_types=1);

namespace popp\ch04\batch06_9;

class UtilityService extends Service 
{
    /* listing 04.47, page 104 */
        /* Changing access rights to trait methods */
    use PriceUtilities {
        PriceUtilities::calculateTax as private;
    }

    public function __construct(private float $price) {}

    public function getTaxRate(): float 
    {
        return 20;
    }

    public function getFinalPrice(): float 
    {
        return ($this->price + $this->calculateTax($this->price));
    }
}
