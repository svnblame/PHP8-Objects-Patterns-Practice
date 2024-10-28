<?php declare(strict_types=1);

namespace popp\ch12\batch04;

class Runner {
    public static function run()
    {
        $registry  = Registry::instance();
        $registry2 = Registry::instance();

        print_r($registry2->getRequest());
        print_r($registry2->treeBuilder());

        // testing the system

        /* listing 12.08 */
        Registry::testMode();
        $mockRegistry = Registry::instance();

        print_r($mockRegistry);
        Registry::testMode(false);
        $registry4 = Registry::instance();
        print_r($registry4);
    }
}
