<?php declare(strict_types=1);

namespace popp\ch04\batch06_5;

/* listing 04.38, page 99 */
/* Aliasing overridden trait methods */
class UtilityService extends Service 
{
    use PriceUtilities;
    use TaxTools {
        TaxTools::calculateTax insteadof PriceUtilities;
        PriceUtilities::calculateTax as basicTax;
    }
}
