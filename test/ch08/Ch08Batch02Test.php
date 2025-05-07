<?php

namespace popp\ch08;

use popp\BaseUnit;
use popp\ch08\batch02\TimedCostStrategy;
use popp\ch08\batch02\Seminar;
use popp\ch08\batch02\Lecture;
use popp\ch08\batch02\FixedCostStrategy;
use popp\ch08\batch02\Runner;

class Ch08Batch02Test extends BaseUnit
{
    function testLectureAndSeminar()
    {
        $seminar = new Seminar(4, new TimedCostStrategy());
        self::assertEquals('hourly rate', $seminar->chargeType());
        self::assertEquals(4, $seminar->duration());
        self::assertEquals(20, $seminar->cost());

        $lecture = new Lecture(4, new FixedCostStrategy());
        self::assertEquals('fixed rate', $lecture->chargeType());
        self::assertEquals(4, $lecture->duration());
        self::assertEquals(30, $lecture->cost());
    }

    function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        $expected = "lesson charge 20. Charge type: hourly rate\nlesson charge 30. Charge type: fixed rate\n";
        self::assertEquals($expected, $val);
    }

    function testRunner2()
    {
        $val = $this->capture(function() { Runner::run2(); });
        self::assertMatchesRegularExpression("/notification: new/", $val);
        self::assertMatchesRegularExpression("/cost/", $val);
    }
}