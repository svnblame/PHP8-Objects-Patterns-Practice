<?php declare(strict_types=1);

namespace ch13;

use popp\test\BaseUnit;
use popp\ch13\batch01\Runner;

class Ch13Batch01Test extends BaseUnit {
    public function testVenueMapper()
    {
        $val = $this->capture(function() { Runner::run(); });

        self::assertMatchesRegularExpression('/Venue Object/', $val);
        self::assertMatchesRegularExpression('/The Likey Lounge/', $val);
    }

    public function testVenueMapper2()
    {
        $val = $this->capture(function() { Runner::run2(); });

        self::assertMatchesRegularExpression('/Venue Object/', $val);
        self::assertMatchesRegularExpression('/The Likey Lounge/', $val);
        self::assertMatchesRegularExpression('/The Bibble Beer Likey Lounge/', $val);
    }

    public function testIterator()
    {
        $val = $this->capture(function() { Runner::run3(); });
        $str = "Loud and Thumping\nEeezy\nDuck and Badger\n";
        self::assertEquals($str, $val);
    }
}
