<?php declare(strict_types=1);

namespace popp\ch11\batch10;

/* listing 11.55 */
class TileForces {
    private int $x;
    private int $y;
    private array $units = [];

    public function __construct(int $x, int $y, UnitAcquisition $acquisition) {
        $this->x = $x;
        $this->y = $y;
        $this->units = $acquisition->getUnits($this->x, $this->y);
    }

    /* listing 11.57 */
    public function firePower(): int
    {
        $power = 0;

        foreach ($this->units as $unit) {
            $power += $unit->bombardStrength();
        }

        return $power;
    }

    public function health(): int
    {
        $health = 0;

        foreach ($this->units as $unit) {
            $health += $unit->getHealth();
        }

        return $health;
    }
}
