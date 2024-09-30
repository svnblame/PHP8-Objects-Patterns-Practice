<?php declare(strict_types=1);

namespace popp\ch11\parse;

class VariableExpression extends Expression
{
    private $name;
    private $val;

    public function __construct($name, $val = null)
    {
        $this->name = $name;
        $this->val = $val;
    }

    public function interpret(Context $context): void
    {
        if (! is_null($this->val)) {
            $context->replace($this, $this->val);
            $this->val = null;
        }
    }

    public function setValue(string $value): void
    {
        $this->val = $value;
    }

    public function getKey(): string
    {
        return $this->name;
    }
}
