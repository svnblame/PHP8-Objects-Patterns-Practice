<?php declare(strict_types=1);

namespace popp\ch10\batch05;

/* listing 10.14 */
abstract class CompositeUnit extends Unit
{
    private $units = [];

    public function getComposite(): ?CompositeUnit
    {
        return $this;
    }

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

    public function getUnits(): array
    {
        return $this->units;
    }
}
