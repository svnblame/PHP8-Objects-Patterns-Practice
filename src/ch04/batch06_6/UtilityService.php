<?php declare(strict_types=1);

namespace popp\ch04\batch06_6;

/* listing 04.41, page 101 */
/* Using static methods in traits */
class UtilityService extends Service 
{
    use PriceUtilities;
}