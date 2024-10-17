<?php declare(strict_types=1);

namespace popp\ch11\batch07;

/* listing 11.40 */
abstract class CompositeUnit extends Unit
{
    private array $units = [];

    public function getComposite(): Unit
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

    public function addUnit(Unit $unit): void
    {
        if (in_array($unit, $this->units, true)) {
            return;
        }

        $this->units[] = $unit;
    }

    public function unitCount(): int
    {
        $count = 0;

        foreach ($this->units as $unit) {
            $count += $unit->unitCount();
        }

        return $count;
    }

    public function textDump($num = 0): string
    {
        $txtOut = parent::textDump($num);

        foreach ($this->units as $unit) {
            $txtOut .= $unit->textDump($num + 1);
        }

        return $txtOut;
    }
}
