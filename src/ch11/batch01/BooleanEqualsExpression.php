<?php declare(strict_types=1);

namespace popp\ch11\batch01;

/* listing 11.09 */
class BooleanEqualsExpression extends OperatorExpression
{
    protected function doInterpret(InterpreterContext $context, $result_l, $result_r): void
    {
        $context->replace($this, $result_l == $result_r);
    }
}
