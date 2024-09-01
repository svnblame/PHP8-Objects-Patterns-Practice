<?php declare(strict_types=1);

namespace popp\ch10\batch03;

class Army extends Unit
{
    private array $units = [];

    public function addUnit(Unit $unit): void
    {
        if (in_array($unit, $this->units, true)) {
            return;
        }

        $this->units[] = $unit;
    }

    public function removeUnit(Unit $unit): void
    {
        $idx = array_search($unit, $this->units, true);

        if (is_int($idx)) {
            array_splice($this->units, $idx, 1, []);
        }
    }

    public function bombardStrength(): int
    {
        $return = 0;
        foreach ($this->units as $unit) {
            $return += $unit->bombardStrength();
        }
        return $return;
    }

    /* listing 10.07 */
    public function getUnits(): array
    {
        return $this->units;
    }
}
