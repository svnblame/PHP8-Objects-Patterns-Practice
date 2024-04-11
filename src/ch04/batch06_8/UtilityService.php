<?php declare(strict_types=1);

namespace popp\ch04\batch06_8;

/* listing 04.46, page 103 */
/* Defining abstract methods in traits */
class UtilityService extends Service 
{
    use PriceUtilities;

    public function getTaxRate(): float 
    {
        return 20;
    }
}