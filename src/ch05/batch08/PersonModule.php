<?php declare(strict_types = 1);

namespace popp\ch05\batch08;

use popp\ch05\batch08\Module;

class PersonModule implements Module
{

    public function setPerson(Person $person): void
    {
        print "PersonModule::setPerson(): {$person->name}\n";
    }

    public function execute(): void
    {
        // TODO: Implement execute() method.
    }
}