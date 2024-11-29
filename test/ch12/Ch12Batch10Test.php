<?php declare(strict_types=1);

namespace ch12;

use popp\test\BaseUnit;
use popp\ch12\batch10\Runner;
use popp\ch12\batch06\Registry;

class Ch12Batch10Test extends BaseUnit {
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });

        $registry = Registry::instance();
        $dsn = $registry->getDsn();
        $pdo = new \PDO($dsn);
        $query = "SELECT * FROM venue WHERE name = 'The Eyeball Inn'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $rows = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $rows[] = $row;
        }
        self::assertCount(1, $rows);
    }
}
