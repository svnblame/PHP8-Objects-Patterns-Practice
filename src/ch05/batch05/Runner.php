<?php declare(strict_types=1);

namespace popp\ch05\batch05;

use popp\ch05\batch05\util as u;
use popp\ch05\batch05\util\db\Querier as q;
use popp\ch04\batch02\BookProduct;

class Runner
{
    public static function runBefore(): void
    {
        /* listing 05.37 */
        $classname = 'Task';
        require_once("tasks/{$classname}.php");
        $classname = "tasks\\{$classname}";
        $myObj = new $classname();
        $myObj->doSpeak();
        /* listing 05.37 */
    }

    public static function run(): void
    {
        /* listing 05.38 */
        $base = __DIR__;
        $classname = 'Task';
        $path = "{$base}/tasks/{$classname}.php";

        if (! file_exists($path)) {
            throw new \Exception("File {$$path} does not exist");
        }

        require_once($path);

        $qclassname = "tasks\\{$classname}";

        if (! class_exists($qclassname)) {
            throw new \Exception("Task {$qclassname} does not exist");
        }

        $myObj = new $qclassname();
        $myObj->doSpeak();
    }

    public static function run2(): void
    {
        /* listing 05.40 */
        $product = self::getProduct();

        if (get_class($product) === 'popp\ch05\batch05\CdProduct') {
            print "\$product is a CdProduct object\n";
        }

        /* listing 05.42 */
        $product = self::getProduct();
        if ($product instanceof \popp\ch05\batch05\CdProduct) {
            print "\$product is an instance of CdProduct\n";
        }
    }

    public static function run3(): void
    {
        print u\Writer::class . "\n";
        print q::class . "\n";
        print Local::class . "\n";
    }

    public static function run4(): void
    {
        print_r(get_class_methods('\\popp\\ch04\\batch02\\BookProduct'));
    }

    public static function getProduct(): CdProduct
    {
        return new CdProduct(
            'Exile on Coldharbour Lane',
            'The',
            'Alabama 3',
            10.99,
            60.33
        );
    }
}