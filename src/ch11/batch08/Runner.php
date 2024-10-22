<?php declare(strict_types=1);

namespace popp\ch11\batch08;

class Runner {
    public static function run(): void
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

    public static function run2(): void
    {
        /* listing 11.45 */
        $main_army = new Army();
        $main_army->addUnit(new Archer());
        $main_army->addUnit(new LaserCannonUnit());
        $main_army->addUnit(new Cavalry());

        $taxCollector = new TaxCollectionVisitor();
        $main_army->accept($taxCollector);

        print $taxCollector->getReport();
        print "TOTAL: ";
        print $taxCollector->getTax() . "\n";
    }
}
