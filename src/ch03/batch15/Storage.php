<?php declare(strict_types=1);

namespace popp\ch03\batch15;

/* listing 04.47 */

class Storage 
{
    public function add(string $key, ?string $value) 
    {
        // do something with $key and $value

        return [$key, $value];
    }
}
