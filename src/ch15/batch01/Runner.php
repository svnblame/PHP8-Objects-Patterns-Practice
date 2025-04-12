<?php declare(strict_types=1);

namespace popp\ch15\batch01;

class Runner
{
    public static function run()
    {
        /* listing 15.13 */
        $earthGame = new EarthGame(
            5,
            'earth',
            true,
            true
        );

        $earthGame::generateTile(5, true);
    }

    public static function index()
    {
        require_once(__DIR__ . '/index.php');
    }
}
