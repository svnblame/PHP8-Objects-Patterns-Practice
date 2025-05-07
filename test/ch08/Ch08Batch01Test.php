<?php

namespace popp\ch08;

use popp\BaseUnit;
use popp\ch08\batch01\Lesson;
use popp\ch08\batch01\Lecture;
use popp\ch08\batch01\Seminar;
use popp\ch08\batch01\Runner;

class Ch08Batch01Test extends BaseUnit
{
    public function testLectureAndSeminar()
    {
        $lecture = new Lecture(5, Lesson::FIXED);
        self::assertEquals($lecture->cost(), 30);
        self::assertEquals($lecture->chargeType(), 'fixed rate');

        $seminar = new Seminar(3, Lesson::TIMED);
        self::assertEquals($seminar->cost(), 15);
        self::assertEquals($seminar->chargeType(), 'hourly rate');
    }

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        $expected = <<<EXPECTED
30 (fixed rate)
15 (hourly rate)

EXPECTED;

        self::assertEquals($expected, $val);
    }
}