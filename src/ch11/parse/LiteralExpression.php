<?php declare(strict_types=1);

namespace popp\ch11\parse;

class LiteralExpression extends Expression
{
    private mixed $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function interpret(Context $context): void
    {
        $context->replace($this, $this->value);
    }
}
