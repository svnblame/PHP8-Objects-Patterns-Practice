<?php declare(strict_types=1);

namespace popp\ch10\batch05;

class Army extends CompositeUnit
{
    public function bombardStrength(): int
    {
        $return = 0;

        foreach ($this->getUnits() as $unit) {
            $return += $unit->bombardStrength();
        }

        return $return;
    }
}
