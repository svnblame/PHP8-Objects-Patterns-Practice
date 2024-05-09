<?php declare(strict_types=1);

namespace popp\test\ch04;

require_once 'vendor/autoload.php';

use popp\test\BaseUnit;
use popp\ch04\Batch07\Runner;
use popp\ch04\Batch07\Document;
use popp\ch04\Batch07\User;

class Batch07Test extends BaseUnit
{
    public function testRunner() 
    {
        $val = $this->capture(function() { Runner::run(); });
        
        self::assertMatchesRegularExpression("/User Object\n\\(/s", $val);
        self::assertMatchesRegularExpression("/SpreadSheet Object\n\\(/s", $val);
    }

    public function testDocumentPrint()
    {
        $val = $this->capture(function() { Runner::run2(); });
        self::assertMatchesRegularExpression("/Document Object\n\\(/s", $val);
    }

    public function testDocumentAndUser()
    {
        $document = Document::create();
        self::assertTrue($document instanceof Document);

        $user = User::create();
        self::assertTrue($user instanceof User);
    }
}