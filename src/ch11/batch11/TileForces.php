<?php declare(strict_types=1);

namespace popp\ch11\batch11;

class TileForces {
    private $x = 0;
    private $y = 0;
    private array $units = [];

    public function __construct(int $x, int $y, UnitAcquisition $acq) {
        $this->x = $x;
        $this->y = $y;
        $this->units = $acq->getUnits($this->x, $this->y);
    }

    /* listing 11.59 */
    public function firePower(): int
    {
        $power = 0;

        foreach ($this->units as $unit) {
            if (! is_null($unit)) {
                $power += $unit->bombardStrength();
            }
        }

        return $power;
    }

    public function health(): int
    {
        $health = 0;

        foreach ($this->units as $unit) {
            if (! is_null($unit)) {
                $health += $unit->getHealth();
            }
        }

        return $health;
    }
}
