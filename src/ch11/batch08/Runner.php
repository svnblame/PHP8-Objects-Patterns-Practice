<?php declare(strict_types=1);

namespace popp\ch11\batch08;

class Runner {
    public static function run()
    {
        /* listing 11.45 */
        $main_army = new Army();
        $main_army->addUnit(new Archer());
        $main_army->addUnit(new LaserCannonUnit());
        $main_army->addUnit(new Cavalry());

        $textDump = new TextDumpArmyVisitor();
        $main_army->accept($textDump);
        print $textDump->getText();
    }
}