<?php declare(strict_types=1);

namespace popp\ch04\batch06_3;

/* listing 04.27, page 95 */
class UtilityService extends Service 
{
    use PriceUtilities;
    use TaxTools {
        TaxTools::calculateTax insteadof PriceUtilities;
    }
}
