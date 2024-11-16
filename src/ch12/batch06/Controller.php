<?php declare(strict_types=1);

namespace popp\ch12\batch06;

class Controller {
    private Registry $registry;

    /* listing 12.19 */
    private function __construct()
    {
        $this->registry = Registry::instance();
    }

    private function handleRequest(): void
    {
        $request = $this->registry->getRequest();
        $controller = new AppController();
        $cmd = $controller->getCommand($request);
        $cmd->execute($request);
        $view = $controller->getView($request);
        $view->render($request);
    }

    private function init(): void
    {
        $this->registry->getApplicationHelper()->init();
    }

    public static function run(): void
    {
        $instance = new self();
        $instance->init();
        $instance->handleRequest();
    }
}
