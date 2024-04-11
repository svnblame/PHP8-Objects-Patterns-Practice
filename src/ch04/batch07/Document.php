<?php declare(strict_types=1);

namespace popp\ch04\batch07;

/* listing 04.59 & 04.55, page 107 & 108 */
/* Late static bindings: the static keyword */
class Document extends DomainObject
{
    public static function getGroup(): string 
    {
        return "document";
    }
}