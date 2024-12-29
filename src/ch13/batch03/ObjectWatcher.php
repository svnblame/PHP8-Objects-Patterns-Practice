<?php declare(strict_types=1);

namespace popp\ch13\batch03;

use popp\ch13\batch01\DomainObject;

/* listing 13.21 */
class ObjectWatcher {
    private array $all = [];
    private static ?ObjectWatcher $instance = null;

    private function __construct() {}

    public static function instance(): self
    {
        if (self::$instance === null) self::$instance = new self();

        return self::$instance;
    }

    public function globalKey(DomainObject $object): string
    {
        return get_class($object) . "." . $object->getId();
    }

    public static function add(DomainObject $object): void
    {
        $instance = self::instance();
        $instance->all[$instance->globalKey($object)] = $object;
    }

    public static function exists(string $className, int $id): ?DomainObject
    {
        $instance = self::instance();
        $key = "{$className}.$id";

        if (isset($instance->all[$key])) return $instance->all[$key];

        return null;
    }
}