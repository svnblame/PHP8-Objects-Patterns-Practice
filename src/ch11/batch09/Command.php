<?php declare(strict_types=1);

namespace popp\ch11\batch09;

/* listing 11.48 */
abstract class Command {
    abstract public function execute(CommandContext $context): bool;
}
