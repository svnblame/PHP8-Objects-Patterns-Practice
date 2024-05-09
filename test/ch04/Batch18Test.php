<?php declare(strict_types=1);

namespace popp\test\ch04;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;
use popp\ch04\batch18\Runner;
use popp\ch04\batch18\OtherPerson;
use popp\ch04\batch18\PersonWriter;

class Batch18Test extends BaseUnit 
{
    public function testRunner() 
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertEquals("Bob\n44\n", $val);
    }

    public function testOtherPerson()
    {
        $val = $this->capture(function() {
            $person = new OtherPerson(new PersonWriter());
            $person->writeName();
        });

        self::assertEquals("Bob\n", $val);
    }
}