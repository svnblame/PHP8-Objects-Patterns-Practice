<?php declare(strict_types=1);

namespace popp\ch04\batch06_3;

/* listing 04.32, page 97 */
interface IdentityObject
{
    public function generateId(): string;
}
