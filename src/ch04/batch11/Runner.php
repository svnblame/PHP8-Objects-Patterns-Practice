<?php declare(strict_types=1);

namespace popp\ch04\batch11;

class Runner 
{
    private static string $logFile = "/usr/local/share/logs/log.txt";

    public static function run() 
    {
        self::init();
    }

    public static function run2()
    {
        self::init2();
    }

    /* listing 04.74, page 119 */
    /* Cleaning up after try/catch blocks with finally */
    public static function init(): void 
    {
        try {
            $fh = fopen(self::$logFile, "a");
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
            throw $e;
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
        try {
            $fh = fopen(self::$logFile, "a");
            fputs($fh, "start\n");
            $conf = new Conf(dirname(__FILE__) . "/conf.not-there.xml");
            print "user: " . $conf->get('user') . "\n";
            print "host: " . $conf->get('host') . "\n";
            $conf->set("pass", "newpass");
            $conf->write();
        } catch (FileException $e) {
            // permission issue or non-existent file
            fputs($fh, "file exception\n");
            // throw $e
        } catch (XmlException $e) {
            // broken xml
            fputs($fh, "xml exception\n");
        } catch (ConfException $e) {
            // wrong kind of XML file
            fputs($fh, "general exception\n");
        } catch (\Exception $e) {
            // backstop: should not be called
            fputs($fh, "general exception\n");
        } finally {
            fputs($fh, "end\n");
            fclose($fh);
        }
    }
}
