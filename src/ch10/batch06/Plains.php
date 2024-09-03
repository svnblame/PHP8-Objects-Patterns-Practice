<?php declare(strict_types=1);

namespace popp\ch10\batch06;

/* listing 10.18 */
/* listing 10.23 */
class Plains extends Tile
{
    private int $wealthFactor = 2;

    public function getWealthFactor(): int
    {
        return $this->wealthFactor;
    }
}
