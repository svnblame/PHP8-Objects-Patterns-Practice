<?php declare(strict_types=1);

namespace popp\ch04\batch23;

class Runner
{
    public static function run2(): void
    {
        /* listing 04.112, page 144 */
        $logger = function ($product) {
            print "    logging ({$product->name})\n";
        };

        $processor = new ProcessSale();
        $processor->registerCallback($logger);

        $processor->sale(new Product('shoes', 6));
        print "\n";
        $processor->sale(new Product('coffee', 6));
    }

    public static function run3(): void
    {
        /* listing 04.113, page 145 */
        $logger = fn($product) => print "    logging ({$product->getName()})\n";

        $processor = new ProcessSale();
        $processor->registerCallback($logger);

        $processor->sale(new Product('shoes', 6));
        print "\n";
        $processor->sale(new Product('coffee', 6));
    }
}
