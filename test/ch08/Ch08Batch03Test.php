<?php

namespace popp\ch08;

use popp\BaseUnit;
use popp\ch08\batch02\TimedCostStrategy;
use popp\ch08\batch02\FixedCostStrategy;
use popp\ch08\batch02\Lecture;
use popp\ch08\batch02\Seminar;

class Ch08Batch03Test extends BaseUnit
{
    function testLectureAndSeminar()
    {
        $lecture = new Lecture(4, new FixedCostStrategy());
        self::assertEquals("fixed rate", $lecture->chargeType());
        self::assertEquals(4, $lecture->duration());
        self::assertEquals(30, $lecture->cost());
    }
}