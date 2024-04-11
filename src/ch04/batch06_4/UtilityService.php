<?php declare(strict_types=1);

namespace popp\ch04\batch06_4;

/* listing 04.36, page 98 */
/* Managing method name conflicts with insteadof */
class UtilityService extends Service 
{
    use PriceUtilities;
    use TaxTools {
        TaxTools::calculateTax insteadof PriceUtilities;
    }
}
