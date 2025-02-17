<?php declare(strict_types=1);

namespace popp\ch13\batch07;

use popp\ch12\batch06\AppException;
use popp\ch12\batch06\Conf;
use popp\ch12\batch10\TableCreator;
use popp\ch13\batch04\Venue;
use popp\ch13\batch04\Registry;

class Runner
{
    /**
     * @throws \Exception
     */
    public static function run(): void
    {
        /* listing 13.41 */
        $idObj = new IdentityObject();

        $idObj->field("name")
            ->eq("'The Good Show'")
            ->field("start")
            ->gt(time())
            ->lt(time() + (24 * 60 * 60));

        print $idObj;
    }

    public static function run2(): void
    {
        /* listing 13.43 */
        try {
            $idObj = new EventIdentityObject();

            $idObj->field("banana")
                ->eq("'The Good Show'")
                ->field("start")
                ->gt(time())
                ->lt(time() + (24 * 60 * 60));

            print $idObj;
        } catch (\Exception $e) {
            print $e->getMessage();
        }
    }
}
