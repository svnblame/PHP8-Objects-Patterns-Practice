<?php declare(strict_types=1);

namespace popp\ch10\batch05;

/* listing 10.15 */
class UnitScript {
    public static function joinExisting(
        Unit $newUnit,
        Unit $occupyingUnit
    ): CompositeUnit {
        $composite = $occupyingUnit->getComposite();

        if (is_null($composite)) {
            $composite = new Army();
            $composite->addUnit($occupyingUnit);
        }

        $composite->addUnit($newUnit);

        return $composite;
    }
}
