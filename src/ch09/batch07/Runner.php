<?php declare(strict_types=1);

namespace popp\ch09\batch07;

class Runner
{
    public static function run(): void
    {
        /* listing 09.20 */
        $megaCommsMgr = new CommsManager(CommsManager::MEGA);
        print (get_class($megaCommsMgr->getApptEncoder())) . "\n";

        $bloggsCommsMgr = new CommsManager(CommsManager::BLOGG);
        print (get_class($bloggsCommsMgr->getApptEncoder())) . "\n";
    }

    public static function run2(): void
    {
        $megaCommsMgr = new CommsManager(CommsManager::MEGA);
        print $megaCommsMgr->getHeaderText();

        $bloggsCommsMgr = new CommsManager(CommsManager::BLOGG);
        print $bloggsCommsMgr->getHeaderText();
    }
}