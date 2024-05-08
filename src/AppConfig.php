<?php declare(strict_types=1);

namespace popp;

final class AppConfig
{
    private static array $config = [
        'dsn' => 'sqlite:/usr/local/share/sqlite/products.sqlite3',
        'log' => '/usr/local/share/logs/log.txt'
    ];
    public static function getConfig(): array
    {
        return self::$config;
    }

    public static function get(string $key): null|string {
        if (! array_key_exists($key, self::$config)) {
            return null;
        }

        return self::$config[$key];
    }
}
