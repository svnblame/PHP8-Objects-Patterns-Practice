<?php declare(strict_types = 1);

namespace popp\ch08\batch02;

class Runner
{
    public static function run()
    {
        /* listing 08.12 */
        $lessons[] = new Seminar(4, new TimedCostStrategy());
        $lessons[] = new Lecture(4, new FixedCostStrategy());

        foreach ($lessons as $lesson) {
            print "lesson charge {$lesson->cost()}. ";
            print "Charge type: {$lesson->chargeType()}\n";
        }
    }
}
