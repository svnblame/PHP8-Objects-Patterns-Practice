<?php

/* listing 15.05 */

namespace popp\ch15\batch01;

use popp\ch10\batch06\PollutionDecorator;
use popp\ch10\batch06\DiamondDecorator;
use popp\ch10\batch06\Plains;

/* listing 15.07 */
class EarthGame extends Game implements Playable, Savable
{
    /* listing 15.11 */
    public function __construct(
        int $size,
        string $name,
        bool $wrapAround = false,
        bool $aliens = false
    ) {
        // implementation
    }

    /* listing 15.10 */
    final public static function generateTile(int $diamondCount, bool $polluted = false): array
    {
        /* listing 15.14 */
        $tile = [];
        for ($i = 0; $i < $diamondCount; $i++) {
            if ($polluted) {
                $tile[] = new PollutionDecorator(new DiamondDecorator(new Plains()));
            } else {
                $tile[] = new DiamondDecorator(new Plains());
            }
        }

        return $tile;
    }
}