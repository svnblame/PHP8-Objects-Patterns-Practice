<?php declare(strict_types=1);

namespace popp\ch04\batch06_2;

/* listing 04.29, page 96 */
trait IdentityTrait
{
    public function generateId(): string 
    {
        return uniqid();
    }
}
