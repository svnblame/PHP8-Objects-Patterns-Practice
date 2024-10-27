<?php declare(strict_types=1);

namespace popp\ch12\batch03;

/* listing 12.05 */
class Registry {
    private static ?Registry $instance = null;
    private array $values = [];

    private function __construct() {}

    public static function instance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function get(string $key): mixed
    {
        if (array_key_exists($key, $this->values)) {
            return $this->values[$key];
        }

        return null;
    }

    public function set(string $key, mixed $value): void
    {
        $this->values[$key] = $value;
    }
}
