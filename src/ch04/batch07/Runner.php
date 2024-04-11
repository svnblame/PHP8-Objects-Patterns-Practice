<?php declare(strict_types=1);

namespace popp\ch04\batch07;

class Runner 
{
    public static function run()
    {
        /* listing 04.61, page 109 */
        /* Late static bindings: the static keyword */
        print_r(User::create());
        print_r(SpreadSheet::create());
    }

    public static function run2()
    {
        /* listing 04.56, page 107 */
        /* Late static bindings: the static keyword */
        print_r(Document::create());
    }
}