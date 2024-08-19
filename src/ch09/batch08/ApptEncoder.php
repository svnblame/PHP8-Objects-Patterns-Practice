<?php declare(strict_types=1);

namespace popp\ch09\batch08;

abstract class ApptEncoder
{
    abstract public function encode(): string;
}
