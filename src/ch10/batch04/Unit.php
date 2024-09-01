<?php declare(strict_types=1);

namespace popp\ch10\batch04;

/* listing 10.10 */

use popp\ch10\batch03\UnitException;

abstract class Unit {
    /**
     * @throws UnitException
     */
    public function addUnit(Unit $unit): void
    {
        throw new UnitException(get_class($this) . " is a leaf");
    }

    /**
     * @throws UnitException
     */
    public function removeUnit(Unit $unit): void
    {
        throw new UnitException(get_class($this) . " is a leaf");
    }

    abstract public function bombardStrength(): int;
}
