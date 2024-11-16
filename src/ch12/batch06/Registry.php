<?php declare(strict_types=1);

namespace popp\ch12\batch06;

class Registry {
    private array $values = [];
    private static $instance = null;
    private ?Request $request = null;
    private ?Conf $conf = null;
    private ?ApplicationHelper $applicationHelper = null;
    private ?\PDO $pdo = null;
    private Conf $commands;

    private function __construct() {}

    public static function instance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public static function reset(): void
    {
        self::$instance = null;
    }

    // must be initialized by some smarter component
    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }

    /**
     * @throws \Exception
     */
    public function getRequest(): Request
    {
        if ($this->request === null) {
            throw new \Exception('No Request set');
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
        return $this->commands;
    }

    public function getDSN(): string
    {
        $conf = $this->getConf();

        return $conf->get('dsn');
    }

    public function getPDO(): \PDO
    {
        if ($this->pdo === null) {
            $dsn = $this->getDSN();

            if ($dsn === null) {
                throw new AppException('No DSN');
            }

            $this->pdo = new \PDO($dsn);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

        return $this->pdo;
    }
}
