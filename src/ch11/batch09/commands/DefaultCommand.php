<?php declare(strict_types=1);

namespace popp\ch11\batch09\commands;

use popp\ch11\batch09\Command;
use popp\ch11\batch09\CommandContext;

class DefaultCommand extends Command
{
    public function execute(CommandContext $context): bool
    {
        // default command
        return true;
    }
}
