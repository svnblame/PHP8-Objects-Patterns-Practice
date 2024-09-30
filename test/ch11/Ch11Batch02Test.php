<?php

namespace ch11;

use popp\test\BaseUnit;
use popp\ch11\batch02\Runner;

class Ch11Batch02Test extends BaseUnit {
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });

        $expected = <<<OUT
popp\\ch11\\batch02\\RegexpMarker
    response: five: well done
    response: four: never mind
popp\\ch11\\batch02\\MatchMarker
    response: five: well done
    response: four: never mind
popp\\ch11\\batch02\\MarkLogicMarker
    response: five: well done
    response: four: never mind

OUT;

        self::assertEquals($expected, $val);
    }
}