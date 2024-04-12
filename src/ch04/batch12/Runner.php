<?php declare(strict_types=1);

namespace popp\ch04\batch12;

/* listing 04.73, page 117 */
/* Subclassing Exception */
class Runner 
{
    public static function run() 
    {
        return Runner::init();
    }

    public static function init() 
    {
        try {
            $conf = new Conf(__DIR__ . "/conf/conf.broken.xml");
            print "user: " . $conf->get('user') . "\n";
            print "host: " . $conf->get('host') . "\n";
            $conf->set("pass", "newpass");
            $conf->write();
        } catch (FileException $e) {
            // permissions issue or non-existent file
            throw $e;
        } catch (XmlException $e) {
            // broken xml
            return "xml exception";
        } catch (ConfException $e) {
            // wrong kind of XML file
        } catch (\Exception $e) {
            // backstop: should not be called
        }
    }
}
