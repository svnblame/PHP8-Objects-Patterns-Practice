<?php declare(strict_types=1);

namespace popp\ch05\batch09;

use Attribute;

#[Attribute]

class ApiInfo
{
    public function __construct(public string $compInfo, public string $depInfo) {}
}