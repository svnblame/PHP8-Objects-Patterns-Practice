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
}
