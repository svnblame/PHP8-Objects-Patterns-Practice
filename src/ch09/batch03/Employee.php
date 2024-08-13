<?php declare(strict_types=1);

namespace popp\ch09\batch03;

/* listing 09.08 */
abstract class Employee
{
    private static $types = ['Minion', 'CluedUp', 'WellConnected'];

    public function __construct(protected string $name) {}

    public static function recruit(string $name): Employee
    {
        $num = rand(1, count(self::$types)) - 1;
        $class = __NAMESPACE__ . '\\' . self::$types[$num];
        return new $class($name);
    }

    abstract public function fire(): void;
}
