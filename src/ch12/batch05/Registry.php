<?php declare(strict_types=1);

namespace popp\ch12\batch05;

class Registry {
    private array $values = [];
    private static ?Registry $instance = null;
    private ?Request $request = null;
    private ?Conf $conf = null;
    private ?Conf $commands = null;
    private ?ApplicationHelper $applicationHelper = null;

    private function __construct() {}

    public static function instance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /* listing 12.12 */
    // must be initialized by some smarter component
    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }

    public function getRequest(): Request
    {
        if ($this->request === null) {
            throw new \Exception('No request set');
        }

        return $this->request;
    }

    public function getApplicationHelper(): ApplicationHelper
    {
        if ($this->applicationHelper === null) {
            $this->applicationHelper = new ApplicationHelper();
        }

        return $this->applicationHelper;
    }

    public function setConf(Conf $conf): void
    {
        $this->conf = $conf;
    }

    public function getConf(): Conf
    {
        if ($this->conf === null) {
            $this->conf = new Conf();
        }

        return $this->conf;
    }

    public function setCommands(Conf $commands): void
    {
        $this->commands = $commands;
    }

    public function getCommands(): Conf
    {
        if ($this->commands === null) {
            $this->commands = new Conf();
        }

        return $this->commands;
    }

    public function getDSN(): string
    {
        $conf = $this->getConf();

        return (string)$conf->get('dsn');
    }
}
