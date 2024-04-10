<?php declare(strict_types=1);

namespace popp\ch04\batch05;

/* listing 04.16, page 89 */
class ShopProduct implements Chargeable 
{
    // ...
    protected float $price;
    // ...

    public function __construct(float $price)
    {
        $this->price = $price;
    }

    public function getPrice():float 
    {
        return $this->price;
    }
    // ...
}
