<?php declare(strict_types=1);

namespace popp\ch03\batch14;

use popp\ch03\batch14\ShopProduct;

class BookProduct extends ShopProduct
{
    public int $numPages;

    public function __construct(
        string $title,
        string $firstName,
        string $mainName,
        float   $price,
        int    $numPages
    ) {
        parent::__construct(
            $title,
            $firstName,
            $mainName,
            $price,
            $numPages
        );

        $this->numPages = $numPages;
    }

    public function getNumberOfPages(): int
    {
        return $this->numPages;
    }

    public function getSummaryLine(): string
    {
        $base = parent::getSummaryLine();
        $base .= ": page count - $this->numPages";

        return $base;
    }

    public function getPrice(): int|float
    {
        return $this->price;
    }
}
