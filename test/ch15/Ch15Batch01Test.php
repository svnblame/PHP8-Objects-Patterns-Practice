<?php

namespace ch15;

require_once('vendor/autoload.php');
require_once('src/ch15/batch01/EbookParser.php');

use popp\ch15\batch01\EbookParser;
use popp\test\BaseUnit;
use popp\ch15\batch01\EarthGame;
use popp\ch15\batch01\Runner;

class Ch15Batch01Test extends BaseUnit
{
    public function testEarthGame()
    {
        $earthGame = new EarthGame(5, 'earth', true, true);
        self::assertInstanceOf(EarthGame::class, $earthGame);

        $tiles = $earthGame::generateTile(5, true);
        self::assertCount(5, $tiles);
    }

    public function testEbookParser()
    {
        $ep = new EbookParser('name', 5);
        self::assertInstanceOf(EbookParser::class, $ep);
    }

    public function testIndex()
    {
        $val = $this->capture(function() { Runner::index(); });
        $expected = "loaded popp\ch15\batch01\Tree\n";
        self::assertEquals($expected, $val);
    }
}
