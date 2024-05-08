<?php declare(strict_types=1);

namespace popp\ch04\batch11;

use popp\AppConfig;
use popp\Logger;

class Runner 
{
    private static array $appConfig = [];

    public function __construct()
    {
        self::$appConfig = AppConfig::getConfig();
    }
    public static function run() 
    {
        self::init();
    }

    public static function run2()
    {
        self::init2();
    }

    public static function run3()
    {
        self::init3();
    }

    /* listing 04.74, page 119 */
    /* Cleaning up after try/catch blocks with finally */
    public static function init(): void 
    {
        $fh = Logger::get();

        try {
            fputs($fh, "start\n");
            $conf = new Conf(dirname(__FILE__) . "/conf.broken.xml");
            print "user: " . $conf->get('user') . "\n";
            print "host: " . $conf->get('host') . "\n";
            $conf->set("pass", "newpass");
            $conf->write();
            fputs($fh, "end\n");
            fclose($fh);
        } catch (FileException $e) {
            // permissions issue or non-existent file
            fputs($fh, "file exception\n");
        } catch (XmlException $e) {
            // broken xml
            fputs($fh, "xml exception\n");
        } catch (ConfException $e) {
            // wrong kind of XML file
            fputs($fh, "conf exception\n");
        } catch (\Exception $e) {
            // backstop: should not be called
            fputs($fh, "general exception\n");
        }
    }

    /* listing 04.75, page 120 */
    /* Cleaning up after try/catch blocks with finally */
    public static function init2(): void 
    {
        $fh = Logger::get();

        try {
            fputs($fh, "start\n");
            $conf = new Conf(dirname(__FILE__) . "/conf.not-there.xml");
            print "user: " . $conf->get('user') . "\n";
            print "host: " . $conf->get('host') . "\n";
            $conf->set("pass", "newpass");
            $conf->write();
        } catch (FileException $e) {
            // permission issue or non-existent file
            fputs($fh, "file exception\n");
        } catch (XmlException $e) {
            // broken xml
            fputs($fh, "xml exception\n");
        } catch (ConfException $e) {
            // wrong kind of XML file
            fputs($fh, "conf exception\n");
        } catch (\Exception $e) {
            // backstop: should not be called
            fputs($fh, "general exception\n");
        } finally {
            fputs($fh, "end\n");
            fclose($fh);
        }
    }

    public static function init3(): void 
    {
        /* listing 04.80, page 124 */
        /* The internal Error class */
        try {
            eval("illigal code");
        } catch (\Error $e) {
            print get_class($e) . "\n";
            print $e->getMessage();
        } catch (\Exception $e) {
            // do something with an Exception
        }
    }
}
