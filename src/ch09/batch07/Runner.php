<?php declare(strict_types=1);

namespace popp\ch09\batch07;

class Runner
{
    public static function run()
    {
        /* listing 09.20 */
        $megaCommsMgr = new CommsManager(CommsManager::MEGA);
        print (get_class($megaCommsMgr->getApptEncoder())) . "\n";

        $bloggsCommsMgr = new CommsManager(CommsManager::BLOGG);
        print (get_class($bloggsCommsMgr->getApptEncoder())) . "\n";
    }
}