<?php declare(strict_types=1);

namespace popp\ch11\batch07;

/* listing 11.39 */
abstract class Unit {
    public function getComposite(): ?Unit
    {
        return null;
    }

    abstract public function bombardStrength(): int;

    public function textDump($num = 0): string
    {
        $txtOut = "";
        $pad = 4 * $num;
        $txtOut .= sprintf("%{$pad}s", "");
        $txtOut .= get_class($this) . ": ";
        $txtOut .= "bombard: " . $this->bombardStrength() . "\n";

        return $txtOut;
    }

    public function unitCount(): int
    {
        return 1;
    }
}
