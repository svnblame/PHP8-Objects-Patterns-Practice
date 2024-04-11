<?php declare(strict_types=1);

namespace popp\ch04\batch07;

/* listing 04.53 & 04.57, page 107 & 108 */
/* Late static bindings: the static keyword */
abstract class DomainObject 
{
    private string $group;

    public function __construct()
    {
        $this->group = static::getGroup();
    }

    public static function create(): DomainObject 
    {
        return new static();
    }

    public static function getGroup(): string 
    {
        return "default";
    }
}