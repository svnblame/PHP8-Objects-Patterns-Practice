<?php declare(strict_types=1);

namespace popp\ch03\batch14;

class ShopProduct
{
    public string $title;
    public string $producerMainName;
    public string $producerFirstName;
    public int|float $price;

    /* listing 03.66 */
    public $discount = 0;

    public function __construct(
        string $title,
        string $firstName,
        string $mainName,
        int|float $price
    ) {
        $this->title             = $title;
        $this->producerFirstName = $firstName;
        $this->producerMainName  = $mainName;
        $this->price             = $price;
    }

    public function setDiscount(int $num): void
    {
        $this->discount = $num;
    }

    public function getPrice(): int|float
    {
        return ($this->price - $this->discount);
    }

    public function getProducer(): string
    {
        return "{$this->producerFirstName} {$this->producerMainName}";
    }

    public function getSummaryLine(): string
    {
        $base = "{$this->title} ( {$this->producerMainName}, ";
        $base .= "{$this->producerFirstName} )";

        return $base;
    }
}
