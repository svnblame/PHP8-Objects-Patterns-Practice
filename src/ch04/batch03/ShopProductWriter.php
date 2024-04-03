<?php declare(strict_types=1);

namespace popp\ch04\batch03;

use popp\ch04\batch02\ShopProduct;

/* listing 04.09, page 86 */
/* listing 04.11, page 86 */
abstract class ShopProductWriter 
{
    protected array $products = [];

    public function addProduct(ShopProduct $shopProduct): void 
    {
        $this->products[] = $shopProduct;
    }

    abstract function write(): void;
}
