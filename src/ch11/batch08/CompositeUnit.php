<?php declare(strict_types=1);

namespace popp\ch11\batch08;

/* listing 11.42 */
abstract class CompositeUnit extends Unit
{
    private array $units = [];

    public function getComposite(): ?Unit
    {
        return $this;
    }

    public function units(): array
    {
        return $this->units;
    }

    public function removeUnit(Unit $unit): void
    {
        $units = [];

        foreach ($this->units as $thisUnit) {
            if ($unit !== $thisUnit) {
                $units[] = $thisUnit;
            }
        }

        $this->units = $units;
    }

    public function getHealth(): int
    {
        $health = 0;

        foreach ($this->units as $unit) {
            $health += $unit->getHealth();
        }

        return $health;
    }

    public function addUnit(Unit $unit): void
    {
        if (in_array($unit, $this->units, true)) {
            return;
        }

        $unit->setDepth($this->depth + 1);
        $this->units[] = $unit;
    }

    public function accept(ArmyVisitor $visitor): void
    {
        parent::accept($visitor);

        foreach ($this->units as $thisUnit) {
            $thisUnit->accept($visitor);
        }
    }
}
