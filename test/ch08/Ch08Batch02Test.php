<?php

namespace popp\test\ch08;

use popp\test\BaseUnit;
use popp\ch08\batch02\Seminar;
use popp\ch08\batch02\TimedCostStrategy;

class Ch08Batch02Test extends BaseUnit
{
    function testLectureAndSeminar()
    {
        $seminar = new Seminar(4, new TimedCostStrategy());
        self::assertEquals('hourly rate', $seminar->chargeType());
        self::assertEquals(4, $seminar->duration());
        self::assertEquals(20, $seminar->cost());

        //
    }
}