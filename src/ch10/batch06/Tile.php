<?php declare(strict_types=1);

namespace popp\ch10\batch06;

/* listing 10.17 */
/* listing 10.22 */
abstract class Tile {
    abstract public function getWealthFactor(): int;
}