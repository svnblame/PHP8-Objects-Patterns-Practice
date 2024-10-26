<?php declare(strict_types=1);

namespace popp\ch11\batch09;

class Runner {
    public static function run(): void
    {
        /* listing 11.53 */
        $controller = new Controller();
        $context = $controller->getContext();

        $context->addParam('action', 'login');
        $context->addParam('username', 'bob');
        $context->addParam('pass', 'tiddles');
        $controller->process();

        print $context->getError();
    }
}
