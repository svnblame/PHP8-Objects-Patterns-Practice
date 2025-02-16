<?php declare(strict_types=1);

namespace popp\ch13\batch06;

class Runner
{
    public static function run()
    {
        /* listing 13.38 */
        $idObj = new EventIdentityObject();
        $idObj->setMinimumStart(time());
        $idObj->setName("A Fine Show");
        $comps = [];
        $name = $idObj->getName();

        if (! is_null($name)) {
            $comps[] = "name = '{$name}'";
        }

        $minStart = $idObj->getMinimumStart();

        if (! is_null($minStart)) {
            $comps[] = "start > {$minStart}";
        }

        $start = $idObj->getStart();

        if (! is_null($start)) {
            $comps[] = "start = '{$start}'";
        }

        $clause = " WHERE " . implode(" and ", $comps);

        print "{$clause}\n";
    }
}
