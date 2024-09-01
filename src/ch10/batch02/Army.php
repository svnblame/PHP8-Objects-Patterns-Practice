<?php declare(strict_types=1);

namespace popp\ch10\batch02;

class Army
{
    private array $units = [];
    private array $armies = [];

    public function addUnit(Unit $unit): void
    {
        $this->units[] = $unit;
    }

    /* listing 10.04 */
    public function addArmy(Army $army): void
    {
        $this->armies[] = $army;
    }

    /* listing 10.05 */
    public function bombardStrength(): int
    {
        $return = 0;

        foreach ($this->units as $unit) {
            $return += $unit->bombardStrength();
        }

        foreach ($this->armies as $army) {
            $return += $army->bombardStrength();
        }

        return $return;
    }
}
