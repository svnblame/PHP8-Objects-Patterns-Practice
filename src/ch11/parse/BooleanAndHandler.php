<?php declare(strict_types=1);

namespace popp\ch11\parse;

use popp\ch11\batch01\BooleanAndExpression;

class BooleanAndHandler implements Handler
{
    public function handleMatch(Parser $parser, Scanner $scanner)
    {
        $comp1 = $scanner->popResult();
        $comp2 = $scanner->popResult();

        $scanner->popResult(new BooleanAndExpression($comp1, $comp2));
    }
}
