<?php declare(strict_types=1);

namespace popp\ch12\batch02;

class Runner {
    public static function run(): void
    {
        /* listing 12.04 */
        $reg = Registry::instance();
        print_r($reg->getRequest());
    }
}
