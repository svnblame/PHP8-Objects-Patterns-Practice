<?php

namespace popp\ch08\batch02;

/* listing 08.10 */
class TimedCostStrategy extends CostStrategy
{

    public function cost(Lesson $lesson): int
    {
        return ($lesson->duration() * 5);
    }

    public function chargeType(): string
    {
        return 'hourly rate';
    }
}
