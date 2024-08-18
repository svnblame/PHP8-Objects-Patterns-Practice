<?php declare(strict_types=1);

namespace popp\ch09\batch05;

abstract class Preferences
{
    private array $props = [];
    private static bool $mockMode = false;
    private static ?self $instance = null;

    private function __construct() {}

    public static function getInstance(): self
    {
        if (is_null(self::$instance)) {
            self::$instance = (self::$mockMode) ? new PreferencesMock() : new PreferencesImpl();
        }

        return self::$instance;
    }

    public static function mockMode(bool $which = true): void
    {
        self::$mockMode = $which;
        self::$instance = null;
    }

    abstract public function getDsn(): string;
}
