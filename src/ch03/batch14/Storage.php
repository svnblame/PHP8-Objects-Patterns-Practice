<?php declare(strict_types=1);

namespace popp\ch03\batch14;

/* listing 03.44 */
class Storage
{
    public function add(string $key, string|bool|null $value)
    {
        // do something with $key and $value

        return [$key, $value];
    }

    public function setShopProduct(ShopProduct|null $product)
    {
        // do something with $product

        return $product;
    }

    public function setShopProduct2(ShopProduct|false $product)
    {
        // do something with $product

        return $product;
    }
}
