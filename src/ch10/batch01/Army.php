<?php declare(strict_types=1);

namespace popp\ch10\batch01;

/* listing 10.02 */
class Army {
    private array $units = [];

    public function addUnit(Unit $unit): void
    {
        $this->units[] = $unit;
    }

    public function bombardStrength(): int
    {
        $return = 0;

        foreach ($this->units as $unit) {
            $return += $unit->bombardStrength();
        }

        return $return;
    }
}
