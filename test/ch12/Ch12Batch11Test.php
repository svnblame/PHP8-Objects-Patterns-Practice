<?php declare(strict_types=1);

namespace popp\ch12;

use popp\BaseUnit;
use popp\ch12\batch11\Runner;
use popp\ch12\batch11\SpaceCollection;

class Ch12Batch11Test extends BaseUnit {
    public function testRunner()
    {
        $venue = Runner::run();
        self::assertEquals("bob's house", $venue->getName());

        $spaces = $venue->getSpaces();
        self::assertInstanceOf(SpaceCollection::class, $spaces);
    }
}
