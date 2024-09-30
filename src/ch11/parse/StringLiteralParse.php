<?php declare(strict_types=1);

namespace popp\ch11\parse;

class StringLiteralParse extends Parser
{
    public function push(Scanner $scanner): void {}

    public function trigger(Scanner $scanner): bool
    {
        return (
            $scanner->tokenType() == Scanner::APOS ||
            $scanner->tokenType() == Scanner::QUOTE
        );
    }

    protected function doScan(Scanner $scanner): bool
    {
        $quoteChar = $scanner->tokenType();
        $return = false;
        $string = "";

        while ($token = $scanner->nextToken()) {
            if ($token == $quoteChar) {
                $return = true;
                break;
            }

            $string .= $scanner->token();
        }

        if ($string && ! $this->discard) {
            $scanner->pushResult($string);
        }

        return $return;
    }
}
