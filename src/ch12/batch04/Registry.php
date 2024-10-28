<?php declare(strict_types=1);

namespace popp\ch12\batch04;

class Registry {
    private static ?Registry $instance = null;
    private ?Request $request = null;

    /* listing 12.06 */
    private ?TreeBuilder $treeBuilder = null;
    private ?Conf $conf = null;

    /* listing 12.07 */
    private static $testMode = false;

    private function __construct() {}

    public static function testMode(bool $mode = true): void
    {
        self::$instance = null;
        self::$testMode = $mode;
    }

    public static function instance(): self
    {
        if (self::$instance === null) {
            if (self::$testMode) {
                self::$instance = new MockRegistry();
            } else {
                self::$instance = new self();
            }
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

    public function treeBuilder(): TreeBuilder
    {
        if ($this->treeBuilder === null) {
            $this->treeBuilder = new TreeBuilder($this->conf()->get('treedir'));
        }

        return $this->treeBuilder;
    }

    public function conf(): Conf
    {
        if ($this->conf === null) {
            $this->conf = new Conf();
        }

        return $this->conf;
    }
}
