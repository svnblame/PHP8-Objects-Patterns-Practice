<?php declare(strict_types=1);

namespace popp\ch10\batch06;

class Runner {
    public static function run()
    {
        /* listing 10.21 */
        $tile = new PollutedPlains();
        print $tile->getWealthFactor();
    }
}
