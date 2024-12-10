<?php declare(strict_types = 1);

namespace popp\ch13\batch01;

use PDO;
use popp\ch12\batch06\Conf;

class Runner
{
    public static function run(): void
    {
        // setup configuration
        self::setup();
        $mapper = new VenueMapper();
        $venue = new Venue(-1, "The Likey Lounge");
        $mapper->insert($venue);
        $venue = new Venue(-1, "The Hatey Lounge");
        $mapper->insert($venue);

        /* listing 13.04 */
        $mapper = new VenueMapper();
        $venue = $mapper->find(2);
        print_r($venue);
    }

    private static function setup()
    {
        $config = __DIR__ . "/data/woo_options.ini";
        $options = parse_ini_file($config, true);
        Registry::reset();
        $reg = Registry::instance();
        $conf = new Conf($options['config']);
        $reg->setConf($conf);
        $reg = Registry::instance();
        $dsn = $reg->getDSN();

        if (is_null($dsn)) {
            throw new AppException("No DSN");
        }

        $pdo = new \PDO($dsn);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $autoIncrement = "AUTOINCREMENT";

        $pdo->query("DROP TABLE IF EXISTS venue");
        $pdo->query("CREATE TABLE venue ( id INTEGER PRIMARY KEY
                   $autoIncrement, name TEXT)");
        $pdo->query("INSERT INTO venue (name) VALUES ('bob')");

        $pdo->query("DROP TABLE IF EXISTS space");
        $pdo->query("CREATE TABLE space (id INTEGER PRIMARY KEY
                   $autoIncrement, venue INTEGER, name TEXT)");

        $pdo->query("DROP TABLE IF EXISTS event");
        $pdo->query("CREATE TABLE event (id INTEGER PRIMARY KEY
                   $autoIncrement, space INTEGER, start LONG, duration INT, name TEXT )");
    }
}
