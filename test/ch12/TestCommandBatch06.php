<?php declare(strict_types=1);

namespace popp\ch12;

use popp\ch12\batch06\Command;
use popp\ch12\batch06\Request;

class TestCommandBatch06 extends Command
{
    protected function doExecute(Request $request): int
    {
        // do nothing
        return Command::CMD_DEFAULT;
    }
}
