<?php declare(strict_types=1);

namespace ch13;

use JetBrains\PhpStorm\NoReturn;
use popp\ch12\batch06\AppException;
use popp\test\BaseUnit;
use popp\ch13\batch04\Runner;

class Ch13Batch04Test extends BaseUnit {
    /**
     * @throws AppException
     */
    #[NoReturn]
    public function testRunner()
    {
        $names = Runner::run();
        // demonstrates that objects update
        $expected = ["The Likey Lounge", "The Bibble Beer Likey Lounge"];
        self::assertEquals($expected, $names);

        /*$val = $this->capture(function() { Runner::run2(); });
        $expected = "inserting The Green Trees\ninserting The Space Upstairs\ninserting The Bar Stage\n";
        self::assertEquals($expected, $val);

        $val = $this->capture(function() { Runner::run3(); });
        $expected = "    happy happy time\n    cry sad shouty time\n";
        self::assertEquals($expected, $val);*/
    }
}