<?php declare(strict_types=1);

namespace popp\ch12\batch02;

/* listing 12.02 */
class Registry {
    private static ?Registry $instance = null;
    private ?Request $request = null;

    private function __construct() {}

    public static function instance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getRequest(): Request
    {
        if ($this->request === null) {
            $this->request = new Request();
        }

        return $this->request;
    }
}
