<?php declare(strict_types=1);

namespace popp\ch12\batch10;

class TableCreator extends Base
{
    public function createTables(): void
    {
        $pdo = $this->getPdo();
        $autoIncrement = 'AUTOINCREMENT';

        // Create new table 'venue' and insert data
        $pdo->query('DROP TABLE IF EXISTS venue');
        $pdo->query("CREATE TABLE venue ( id INTEGER NOT NULL PRIMARY KEY 
                   $autoIncrement, name TEXT )");
        $pdo->query("INSERT INTO venue ( name ) VALUES ('bob')");

        // Create new table 'space'
        $pdo->query('DROP TABLE IF EXISTS space');
        $pdo->query("CREATE TABLE space ( id INTEGER NOT NULL PRIMARY KEY
                   $autoIncrement, venue INTEGER, name TEXT )");

        // Create new table 'event'
        $pdo->query('DROP TABLE IF EXISTS event');
        $pdo->query("CREATE TABLE event ( id INTEGER NOT NULL PRIMARY KEY $autoIncrement, space INTEGER, start LONGTEXT, duration INTEGER, name TEXT)");
    }
}
