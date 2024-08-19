<?php declare(strict_types=1);

namespace popp\ch09\batch07;

/* listing 09.18 */
/* listing 09.21 */

class CommsManager
{
    public const BLOGG = 1;
    public const MEGA = 2;

    public function __construct(private int $mode) {}

    public function getApptEncoder(): ApptEncoder
    {
        return match ($this->mode) {
            self::MEGA => new MegaApptEncoder(),
            default => new BloggsApptEncoder(),
        };
    }

    /* listing 09.18 */
    public function getHeaderText(): string
    {
        return match ($this->mode) {
            self::MEGA => "MegaCal header\n",
            default => "BloggsCal header\n",
        };
    }
}
