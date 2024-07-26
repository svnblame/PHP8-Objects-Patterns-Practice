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

    public static function run5(): void
    {
        /* listing 05.47 */
        /* listing 05.56 */
        $product = self::getProduct();
        $method = "getTitle";   // define a method name
        print $product->$method();   // invoke the method

        /* listing 05.48 */
        if (in_array($method, get_class_methods($product))) {
            print $product->$method();
        }

        /* listing 05.49 */
        if (is_callable([$product, $method])) {
            print $product->$method();
        }

        /* listing 05.51 */
        if (method_exists($product, $method)) {
            print $product->$method();
        }

        /* listing 05.52 */
        print_r(get_class_vars('\\popp\\ch05\\batch05\\CdProduct'));

        print get_parent_class('\\popp\\ch04\\batch02\\BookProduct');

        /* listing 05.54 */
        $product = self::getBookProduct();   // aquire an object

        if (is_subclass_of($product, '\\popp\\ch04\\batch02\\ShopProduct')) {
            print "BookProduct is a subclass of ShopProduct\n";
        }

        /* listing 05.55 */
        if (in_array('someInterface', class_implements($product))) {
            print "BookProduct is an interface of someInterface\n";
        }

        /* listing 05.57 */
        $product = self::getBookProduct();
        call_user_func([$product, 'setDiscount'], 20);
    }

    public static function runDeclared(): void
    {
        /* listing 05.39 */
        print_r(get_declared_classes());
    }

    public static function runObjClass(): void
    {
        /* listing 05.45 */
        $bookproduct = new BookProduct(
            'Catch 22',
            'Joseph',
            'Helleer',
            11.99,
            300
        );

        print $bookproduct::class;
    }

    public static function runLocal(): void
    {
        $here = getcwd();
        chdir(__DIR__);
        require_once('LocalNsEg.php');

        chdir($here);
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

    public static function getBookProduct(): BookProduct
    {
        return new BookProduct(
            'Catch 22',
            'Joseph',
            'Heller',
            11.99,
            300
        );
    }
}
