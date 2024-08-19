<?php declare(strict_types=1);

namespace popp\ch09\batch08;

class Runner
{
    public static function run()
    {
        /* listing 09.26 */
        $bloggsCommsMgr = new BloggsCommsManager();
        print $bloggsCommsMgr->getHeaderText();
        print $bloggsCommsMgr->getApptEncoder()->encode();
        print $bloggsCommsMgr->getFooterText();
    }
}
