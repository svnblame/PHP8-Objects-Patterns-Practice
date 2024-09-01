<?php declare(strict_types=1);

namespace popp\ch10\batch04;

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
        $index = array_search($unit, $this->units, true);

        if (is_int($index)) {
            array_splice($this->units, $index, 1, []);
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

    public function getUnits(): array
    {
        return $this->units;
    }
}
