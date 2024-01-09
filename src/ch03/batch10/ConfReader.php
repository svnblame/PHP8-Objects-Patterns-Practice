<?php

declare(strict_types=1);

namespace popp\ch03\batch10;

/* listing 03.39, page 45 */
class ConfReader
{
    public function getValues(array $default = [])
    {
        $values = [];

        // do something to get values

        $values = ["name" => "mary"];

        // merge the provided defaults (it will always be an array)
        return array_merge($default, $values);
    }
}
