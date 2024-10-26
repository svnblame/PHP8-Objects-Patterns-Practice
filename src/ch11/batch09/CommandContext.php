<?php declare(strict_types=1);

namespace popp\ch11\batch09;

/* listing 11.50 */
class CommandContext {
    private array $params = [];
    private string $error = '';

    public function __construct()
    {
        $this->params = $_REQUEST;
    }

    public function addParam(string $key, $value): void
    {
        $this->params[$key] = $value;
    }

    public function get(string $key): string|null
    {
        if (isset($this->params[$key])) {
            return $this->params[$key];
        }

        return null;
    }

    public function setError(string $error): void
    {
        $this->error = $error;
    }

    public function getError(): string
    {
        return $this->error;
    }
}
