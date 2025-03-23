<?php declare(strict_types=1);

namespace ch13;

use popp\test\BaseUnit;
use popp\ch13\batch07\Runner;

class Ch13Batch07Test extends BaseUnit
{
    public function testRunner()
    {
        $val = $this->capture(function () { Runner::run(); });
        self::assertMatchesRegularExpression("/^name = 'The Good Show' AND start > \d+ AND start < \d+/", $val);

        $val = $this->capture(function () { Runner::run2(); });
        self::assertEquals("Field 'banana' is not a legal field (name, id, start, duration, space)", $val);

        $val = $this->capture(function () { Runner::run3(); });
        self::assertMatchesRegularExpression("/UPDATE venue SET name = \? WHERE id = \?/", $val);
        self::assertMatchesRegularExpression("/The Happy Hairband/", $val);
        self::assertMatchesRegularExpression("/334/", $val);

        $val = $this->capture(function () { Runner::run3_1(); });
        self::assertMatchesRegularExpression("/The Lonely Hat Hive/", $val);

        $val = $this->capture(function () { Runner::run4(); });
        self::assertMatchesRegularExpression("/SELECT name,id FROM venue WHERE name = \?/", $val);
        self::assertMatchesRegularExpression("/The Happy Hairband/", $val);
    }
}
