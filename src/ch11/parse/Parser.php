<?php declare(strict_types=1);

namespace popp\ch11\parse;

abstract class Parser {
    protected Handler $handler;
    protected bool $debug = false;
    protected bool $discard = false;
    protected string $name;

    public function __construct(string $name = null)
    {
        if (is_null($name)) {
            $this->name = get_class($this);
        } else {
            $this->name = $name;
        }
    }

    public function setHandler(Handler $handler): void
    {
        $this->handler = $handler;
    }

    public function invokeHandler(Scanner $scanner): void
    {
        if (! empty($this->handler)) {
            if ($this->debug) {
                $this->report("Calling handler: " . get_class($this->handler));
            }
            $this->handler->handleMatch($this, $scanner);
        }
    }

    public function report(string $message): void
    {
        print "<{$this->name}> " . get_class($this) . ": {$message}\n";
    }

    public function push(Scanner $scanner): void
    {
        if ($this->debug) {
            $this->report("Pushing {$scanner->token()}");
        }
        $scanner->pushResult($scanner->token());
    }

    public function scan(Scanner $scanner)
    {
        $return = $this->doScan($scanner);

        if ($return && ! $this->discard && $this->term()) {
            $this->push($scanner);
        }

        if ($return) {
            $this->invokeHandler($scanner);
        }

        if ($this->debug) {
            $this->report("::scan returning $return");
        }

        if ($this->term() && $return) {
            $scanner->nextToken();
            $scanner->eatWhiteSpace();
        }

        return $return;
    }

    public function discard(): void
    {
        $this->discard = true;
    }

    abstract public function trigger(Scanner $scanner);

    abstract protected function doScan(Scanner $scanner);

    public function term(): bool
    {
        return true;
    }
}