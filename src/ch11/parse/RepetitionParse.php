<?php declare(strict_types=1);

namespace popp\ch11\parse;

class RepetitionParse extends CollectionParse
{
    public function trigger(Scanner $scanner)
    {
        return true;
    }

    protected function doScan(Scanner $scanner)
    {
        $s_copy = clone $scanner;

        if (empty($this->parsers)) {
            return true;
        }

        $parser = $this->parsers[0];
        $count = 0;

        while (true) {
            if (! $parser->trigger($s_copy)) {
                $scanner->updateToMatch($s_copy);
                return true;
            }

            $s_copy_2 = clone $s_copy;

            if (! $parser->scan($s_copy_2)) {
                $scanner->updateToMatch($s_copy);
                return true;
            }

            $count++;

            $s_copy = $s_copy_2;
        }

        return true;
    }
}
