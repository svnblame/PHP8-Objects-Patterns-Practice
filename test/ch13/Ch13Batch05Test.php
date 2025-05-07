<?php declare(strict_types=1);

namespace popp\ch13;

use popp\BaseUnit;
use popp\ch13\batch05\Runner;

class Ch13Batch05Test extends BaseUnit
{
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertMatchesRegularExpression("/Venue Object/", $val);

        $names = Runner::run2();
        $expected = [
            'The Venue',
            'The Other Venue',
        ];

        self::assertEquals($expected, $names);
    }
}
