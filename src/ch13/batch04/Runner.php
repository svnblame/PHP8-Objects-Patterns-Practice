<?php declare(strict_types=1);

namespace popp\ch13\batch04;

use JetBrains\PhpStorm\NoReturn;
use popp\ch12\batch10\TableCreator;
use popp\ch12\batch06\Conf;
use popp\ch12\batch06\AppException;

class Runner {
    /**
     * @throws AppException
     */
    #[NoReturn]
    public static function run(): array
    {
        self::setUp();

        $mapper = new VenueMapper();

        $venue = new Venue(-1, "The Likey Lounge");
        $mapper->insert($venue);
        $venue = $mapper->find($venue->getId());
        $names[] = $venue->getName();
        $venue->setName("The Bibble Beer Likey Lounge");
        $mapper->update($venue);
        $venue = $mapper->find($venue->getId());
        $names[] = $venue->getName();

        return $names;
    }

    public static function run2()
    {
        self::setUp();
        ObjectWatcher::reset();

        /* listing 13.28 */

        // a -1 id value represents a brand-new Venue or Space
        $venue = new Venue(-1, "The Green Trees");

        $venue->addSpace(
            new Space(-1, 'The Space Upstairs')
        );

        $venue->addSpace(
            new Space(-1, 'The Bar Stage')
        );

        // this could be called from the controller or a helper class
        ObjectWatcher::instance()->performOperations();
    }

    #[NoReturn]
    public static function setUp(): void
    {
        $config = __DIR__ . "/../batch01/data/woo_options.ini";
        $options = parse_ini_file($config, true);
        Registry::reset();
        $registry = Registry::instance();
        $conf = new Conf($options['config']);
        $registry->setConf($conf);
        $registry = Registry::instance();
        $dsn = $registry->getDSN();

        if (is_null($dsn)) {
            throw new AppException("No DSN defined");
        }

        $pdo = new \PDO($dsn);
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $primaryKey = "INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL";

        // Venue data structure
        $pdo->query("DROP TABLE IF EXISTS venue");
        $pdo->query("CREATE TABLE IF NOT EXISTS venue (
                        id $primaryKey,
                        name TEXT
                    )"
        );
        $pdo->query("INSERT INTO venue ( name ) VALUES ( 'bob' )");

        // Space data structure
        $pdo->query("DROP TABLE IF EXISTS space");
        $pdo->query("CREATE TABLE IF NOT EXISTS space (
                                id $primaryKey, venue INTEGER,
                                name TEXT
                    )"
        );

        // Event data structure
        $pdo->query("DROP TABLE IF EXISTS event");
        $pdo->query("CREATE TABLE IF NOT EXISTS event (
                                id $primaryKey,
                                space INTEGER,
                                start long,
                                duration int,
                                name TEXT
                    )"
        );
    }
}
