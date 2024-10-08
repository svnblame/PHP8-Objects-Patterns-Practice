<?php declare(strict_types=1);

namespace popp\ch11\parse;

use popp\ch11\batch01\BooleanOrExpression;

class BooleanOrHandler implements Handler
{
    public function handleMatch(Parser $parser, Scanner $scanner)
    {
        $comp1 = $scanner->popResult();
        $comp2 = $scanner->popResult();

        $scanner->pushResult(new BooleanOrExpression($comp1, $comp2));
    }
}
