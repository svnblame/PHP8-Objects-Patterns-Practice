<?php declare(strict_types=1);

namespace popp\ch11\batch09;

/* listing 11.51 */
class CommandFactory {
    private static string $dir = 'commands';

    public static function getCommand(string $action = 'Default'): Command
    {
        if (preg_match('/\W/', $action)) {
            throw new \Exception('Illegal characters in action');
        }

        $class = __NAMESPACE__ . '\\commands\\' . UCFirst(strtolower($action)) . 'Command';

        if (! class_exists($class)) {
            throw new CommandNotFoundException("'$class' does not exist");
        }

        return new $class();
    }
}