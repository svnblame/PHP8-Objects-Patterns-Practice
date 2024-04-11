<?php declare(strict_types=1);

namespace popp\ch04\batch06_3;

use popp\ch04\batch06_2\IdentityTrait;

/* listing 04.33, page 97 */
class ShopProduct implements IdentityObject 
{
    use PriceUtilities, IdentityTrait;
}