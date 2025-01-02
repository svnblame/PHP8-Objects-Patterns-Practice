<?php declare(strict_types=1);

namespace popp\ch13\batch04;

class ObjectWatcher {
    /* listing 13.24 */

    private array $all = [];
    private array $dirty = [];
    private array $new = [];
    private array $delete = [];
    private static ?ObjectWatcher $instance = null;

    private function __construct() {}

    public static function instance(): self
    {
        if (null === self::$instance) self::$instance = new self();

        return self::$instance;
    }

    public static function reset(): void
    {
        self::$instance = null;
    }

    public function globalKey(DomainObject $object): string
    {
        return get_class($object) . "." . $object->getId();
    }

    public static function add(DomainObject $object): DomainObject
    {
        $instance = self::instance();
        $instance->all[$instance->globalKey($object)] = $object;

        return $object;
    }

    public static function exists($className, $id): ?DomainObject
    {
        $instance = self::instance();
        $key = "{$className}.$id";

        if (isset($instance->all[$key])) return $instance->all[$key];

        return null;
    }

    /* listing 13.24 */
    public static function addDelete(DomainObject $object): void
    {
        $instance = self::instance();
        $instance->delete[$instance->globalKey($object)] = $object;
    }

    public static function addDirty(DomainObject $object): void
    {
        $instance = self::instance();

        if (! in_array($object, $instance->new, true)) $instance->dirty[$instance->globalKey($object)] = $object;
    }

    public static function addNew(DomainObject $object): void
    {
        $instance = self::instance();
        // we don't yet have an id
        $instance->new[] = $object;
    }

    public static function addClean(DomainObject $object): void
    {
        $instance = self::instance();
        unset($instance->delete[$instance->globalKey($object)]);
        unset($instance->dirty[$instance->globalKey($object)]);

        $instance->new = array_filter(
            $instance->new,
            function ($a) use ($object) {
                return !($a === $object);
            }
        );
    }

    public function performOperations(): void
    {
        foreach ($this->dirty as $key => $object) {
            $object->getFinder()->update($object);
        }

        foreach ($this->new as $key => $object) {
            $object->getFinder()->insert($object);
            print "inserting " . $object->getName() . "\n";
        }

        $this->dirty = [];
        $this->new = [];
    }
}
