<?php declare(strict_types=1);

namespace popp\ch13\batch06;

/* listing 13.36 */
class EventIdentityObject extends IdentityObject
{
    private ?int $start = null;
    private ?int $minStart = null;

    public function setMinimumStart(int $minStart): void
    {
        $this->minStart = $minStart;
    }

    public function getMinimumStart(): int
    {
        return $this->minStart;
    }

    public function setStart(int $start): void
    {
        $this->start = $start;
    }

    public function getStart(): ?int
    {
        return $this->start;
    }
}
