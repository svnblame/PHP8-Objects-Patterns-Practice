<?php declare(strict_types=1);

namespace popp\ch13\batch07;

use JetBrains\PhpStorm\NoReturn;
use PDO;
use popp\ch12\batch06\Conf;
use popp\ch13\batch04\Venue;
use popp\ch13\batch04\Registry;

class Runner
{
    /**
     * @throws \Exception
     */
    public static function run(): void
    {
        /* listing 13.41 */
        $idObj = new IdentityObject();

        $idObj->field("name")
            ->eq("'The Good Show'")
            ->field("start")
            ->gt(time())
            ->lt(time() + (24 * 60 * 60));

        print $idObj;
    }

    public static function run2(): void
    {
        /* listing 13.43 */
        try {
            $idObj = new EventIdentityObject();

            $idObj->field("banana")
                ->eq("'The Good Show'")
                ->field("start")
                ->gt(time())
                ->lt(time() + (24 * 60 * 60));

            print $idObj;
        } catch (\Exception $e) {
            print $e->getMessage();
        }
    }

    public static function run3(): void
    {
        /* listing 13.46 */
        $vuf = new VenueUpdateFactory();
        print_r($vuf->newUpdate(new Venue(334, "The Happy Hairband")));
    }

    public static function run3_1(): void
    {
        /* listing 13.47 */
        $vuf = new VenueUpdateFactory();
        print_r($vuf->newUpdate(new Venue(334, "The Lonely Hat Hive")));
    }

    /**
     * @throws \Exception
     */
    public static function run4(): void
    {
        /* listing 13.50 */
        $vio = new VenueIdentityObject();
        $vio->field("name")->eq("The Happy Hairband");

        $vsf = new VenueSelectionFactory();
        print_r($vsf->newSelection($vio));
    }

    /**
     * @throws \Exception
     */
    #[NoReturn]
    public static function run5(): void
    {
        self::setUp();

        /* listing 13.52 */
        $factory = PersistenceFactory::getFactory(Venue::class);
        $finder = new DomainObjectAssembler($factory);

        $venue1 = new Venue(-1, "The Likey Lounge");
        $venue2 = new Venue(-1, "The Eyeball Inn");
        $venue3 = new Venue(-1, "The Eyeball Inn");
        $venue4 = new Venue(-1, "The Eyeball Inn");

        $finder->insert($venue1);
        $finder->insert($venue2);
        $finder->insert($venue3);
        $finder->insert($venue4);

        /* listing 13.53 */
        $idObj = $factory->getIdentityObject()
            ->field('name')
            ->eq('The Eyeball Inn');

        $collection = $finder->find($idObj);

        foreach ($collection as $venue) {
            print $venue->getName() . "\n";
        }
    }

    private static function setUp(): void
    {
        $config = __DIR__ . "/../batch01/data/woo_options.ini";
        $options = parse_ini_file($config, true);
        Registry::reset();
        $reg = Registry::instance();
        $conf = new Conf($options['config']);
        $reg->setConf($conf);
        $reg = Registry::instance();
        $dsn = $reg->getDsn();

        $pdo = new PDO($dsn);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $ai = "AUTOINCREMENT";
        // Venue
        $pdo->query("DROP TABLE IF EXISTS `venue`");
        $pdo->query(
            "CREATE TABLE IF NOT EXISTS `venue` (
            `id` INTEGER PRIMARY KEY $ai,
            `venue` INTEGER, `name` TEXT 
                                   )",
        );
        $pdo->query("INSERT INTO `venue` ( `name` ) VALUES ( 'bob' )");

        // Space
        $pdo->query("DROP TABLE IF EXISTS `space`");
        $pdo->query(
            "CREATE TABLE IF NOT EXISTS `space` (
                        `id` INTEGER PRIMARY KEY $ai,
                        `venue` INTEGER, `name` TEXT)",
        );

        // Event
        $pdo->query("DROP TABLE IF EXISTS `event`");
        $pdo->query(
            "CREATE TABLE IF NOT EXISTS `event` ( 
                        `id` INTEGER PRIMARY KEY $ai,
                        `space` INTEGER,
                        `start` LONG,
                        `duration` INTEGER,
                        `name` TEXT 
                    )",
        );
    }
}
