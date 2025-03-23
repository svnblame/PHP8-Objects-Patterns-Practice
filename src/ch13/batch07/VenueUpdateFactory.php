<?php declare(strict_types=1);

namespace popp\ch13\batch07;

use popp\ch13\batch04\DomainObject;

/* listing 13.45 */
class VenueUpdateFactory extends UpdateFactory
{
    public function newUpdate(DomainObject $object): array
    {
        // NOTE: No type checking here....
        $id = $object->getId();
        $cond = null;
        $values['name'] = $object->getName();

        if ($id > 0) {
            $cond['id'] = $id;
        }

        return $this->buildStatement('venue', $values, $cond);
    }
}
