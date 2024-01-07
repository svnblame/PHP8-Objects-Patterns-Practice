<?php

namespace popp\ch03\batch04;

class ShopProduct
{
    public function __construct(
        public $title,
        public $producerFirstName = "",
        public $producerMainName = "",
        public $price = 0
    ) {}

    public function getProducer()
    {
        return $this->producerFirstName . " " . $this->producerMainName;
    }
}
