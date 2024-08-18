<?php declare(strict_types = 1);

namespace popp\ch09\batch04;

/* listing 09.11 & 09.12 & 09.13 */
class Preferences
{
    private array $props = [];
    private static Preferences $instance;

    private function __construct() {}

    public static function getInstance() : Preferences
    {
        if (empty(self::$instance)) {
            self::$instance = new Preferences();
        }

        return self::$instance;
    }

    public function setProperty(string $name, string $value) : void
    {
        $this->props[$name] = $value;
    }

    public function getProperty(string $key): string
    {
        return $this->props[$key];
    }
}
