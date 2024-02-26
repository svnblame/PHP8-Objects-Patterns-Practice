<?php declare(strict_types=1);

namespace popp\ch03\batch12;

/* listing 03.42 */

class Storage
{
    public function add(string $key, int|string|bool $value)
    {
        // do something with $key and $value

        return [$key, $value];
    }
}
