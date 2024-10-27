<?php declare(strict_types=1);

namespace popp\ch12\batch03;

class Runner {
    public static function run()
    {
        $registry = Registry::instance();
        $registry->set('request', new Request());

        $registry = Registry::instance();
        print_r($registry->get('request'));
    }
}
