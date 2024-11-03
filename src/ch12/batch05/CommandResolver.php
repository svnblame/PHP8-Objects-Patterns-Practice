<?php declare(strict_types=1);

namespace popp\ch12\batch05;

/* listing 12.13 */

use ReflectionClass;

class CommandResolver {
    private static ?\ReflectionClass $refCmd = null;
    private static string $defaultCmd = DefaultCommand::class;

    public function __construct()
    {
        // could make this configurable
        self::$refCmd = new \ReflectionClass(Command::class);
    }

    public function getCommand(Request $request): Command
    {
        $registry = Registry::instance();
        $commands = $registry->getCommands();
        $path = $request->getPath();

        $class = $commands->get($path);

        if (is_null($class)) {
            $request->addFeedback("path '{$path}' not matched");
            return new self::$defaultCmd();
        }

        if (! class_exists($class)) {
            $request->addFeedback("class '{$class}' not found");
            return new self::$defaultCmd();
        }

        $refClass = new ReflectionClass($class);

        if (! $refClass->isSubclassOf(self::$refCmd)) {
            $request->addFeedback("command '$refClass' is not a Command");
            return new self::$defaultCmd();
        }

        return $refClass->newInstance();
    }
}
