<?php declare(strict_types=1);

namespace popp\ch11\parse;

abstract class CollectionParse extends Parser
{
    protected array $parsers = [];

    public function add(Parser $parser): Parser
    {
        if (is_null($parser)) {
            throw new \InvalidArgumentException("Parser cannot be null");
        }

        $this->parsers[] = $parser;

        return $parser;
    }

    public function term(): bool
    {
        return false;
    }
}
