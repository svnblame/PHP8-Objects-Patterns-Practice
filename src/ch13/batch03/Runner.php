<?php declare(strict_types=1);

namespace popp\ch13\batch03;

use JetBrains\PhpStorm\NoReturn;
use popp\ch12\batch10\TableCreator;
use popp\ch12\batch06\Conf;
use popp\ch13\batch01\AppException;
use popp\ch13\batch01\Registry;
use popp\ch13\batch01\Venue;

class Runner {
    /**
     * @throws AppException
     */
    #[NoReturn]
    public static function run(): void
    {
        self::setUp();

        /* listing 13.20 */
        $mapper = new VenueMapper();

        $venue = new Venue(-1, "The Likey Lounge");

        $mapper->insert($venue);

        print $venue->name . "\n";

        $venue1 = $mapper->find($venue->getId());
        $venue1->name = "The Something Else";
        print $venue1->name . "\n";

        $venue2 = $mapper->find($venue->getId());
        $venue2->name = "The Bibble Beer Likey Lounge";
        print $venue2->name . "\n";
    }

    /**
     * @throws AppException
     */
    public static function run2(): void
    {
        self::setUp();

        $mapper = new VenueMapper();

        $venue = new Venue(-1, "The Likey Lounge");
        $mapper->insert($venue);
        $venue = $mapper->find($venue->getId());
        $venue->name = "The Bibble Beer Likey Lounge";

        // we haven't saved this yet...
        // what if we get the value from somewhere else?
        $mapper2 = new VenueMapper();
        $venue2 = $mapper2->find($venue->getId());
        print $venue2->name . "\n";
    }

    /**
     * @throws AppException
     */
    private static function setUp(): void
    {
        $config = __DIR__ . '/../batch01/data/woo_options.ini';
        $options = parse_ini_file($config, true);
        Registry::reset();
        $registry = Registry::instance();
        $config = new Conf($options['config']);
        $registry->setConf($config);
        $registry = Registry::instance();
        $dsn = $registry->getDsn();

        if (is_null($dsn)) {
            throw new AppException('No DSN');
        }

        $pdo = new \PDO($dsn);
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $autoIncrement = 'AUTOINCREMENT';

        // Venue data structure
        $pdo->query('DROP TABLE IF EXISTS `venue`');
        $pdo->query(
            "CREATE TABLE `venue` ( `id` INTEGER PRIMARY KEY $autoIncrement, `name` TEXT)"
        );
        $pdo->query("INSERT INTO `venue` ( `name` ) VALUES ('bob')");

        // Space data structure
        $pdo->query('DROP TABLE IF EXISTS `space`');
        $pdo->query(
            "CREATE TABLE space (`id` INTEGER PRIMARY KEY $autoIncrement, `name` TEXT)"
        );

        // Event data structure
        $pdo->query("DROP TABLE IF EXISTS `event`");
        $pdo->query(
            "CREATE TABLE `event` ( `id` INTEGER PRIMARY KEY $autoIncrement, `space` INTEGER, `start` long, `duration` int, `name` TEXT)"
        );
    }
}
