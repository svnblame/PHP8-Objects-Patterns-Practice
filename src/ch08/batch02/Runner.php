<?php declare(strict_types = 1);

namespace popp\ch08\batch02;

class Runner
{
    public static function run(): void
    {
        /* listing 08.12 */
        $lessons[] = new Seminar(4, new TimedCostStrategy());
        $lessons[] = new Lecture(4, new FixedCostStrategy());

        foreach ($lessons as $lesson) {
            print "lesson charge {$lesson->cost()}. ";
            print "Charge type: {$lesson->chargeType()}\n";
        }
    }

    public static function run2(): void
    {
        /* listing 08.17 */
        $lesson1 = new Seminar(4, new TimedCostStrategy());
        $lesson2 = new Lecture(4, new FixedCostStrategy());

        $mgr = new RegistrationMgr();
        $mgr->register($lesson1);
        $mgr->register($lesson2);
    }
}
