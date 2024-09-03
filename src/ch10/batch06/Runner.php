<?php declare(strict_types=1);

namespace popp\ch10\batch06;

class Runner {
    public static function run(): void
    {
        /* listing 10.21 */
        $tile = new PollutedPlains();
        print $tile->getWealthFactor();
    }

    public static function run2(): void
    {
        /* listing 10.27 */
        $tile = new Plains();
        print $tile->getWealthFactor(); // 2
    }

    public static function run3(): void
    {
        /* listing 10.28 */
        $tile = new DiamondDecorator(new Plains());
        print $tile->getWealthFactor(); // 4
    }
}
