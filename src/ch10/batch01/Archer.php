<?php

namespace popp\ch10\batch01;

use popp\ch10\batch01\Unit;

/* listing 10.01 */
class Archer extends Unit
{
    public function bombardStrength(): int
    {
        return 4;
    }
}
