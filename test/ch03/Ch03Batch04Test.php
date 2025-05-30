<?php

namespace popp\ch03;

require_once 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;

use popp\ch03\batch04\ShopProduct;
use popp\ch03\batch04\Runner;

class Ch03Batch04Test extends TestCase
{
    public function testProduct()
    {
        $blah = new ShopProduct("title");
        self::assertTrue($blah instanceof ShopProduct);
        self::assertEquals($blah->title, "title");
        self::assertEmpty($blah->producerFirstName);
        self::assertEmpty($blah->producerMainName);
        self::assertEquals($blah->price, 0);

        $blah2 = new ShopProduct(
            title: "title",
            price: 55
        );
        self::assertTrue($blah2 instanceof ShopProduct);
        self::assertEmpty($blah2->producerFirstName);
        self::assertEmpty($blah2->producerMainName);
        self::assertEquals($blah2->price, 55);

        ob_start();
        Runner::run1();
        $output = ob_get_contents();
        ob_end_clean();
        self::assertEquals("author: Willa Cather\n", $output);

        ob_start();
        Runner::run2();
        $output = ob_get_contents();
        ob_end_clean();
        self::assertEquals("author:  \n", $output);

        ob_start();
        Runner::run3();
        $output = ob_get_contents();
        ob_end_clean();
        self::assertEquals("author:  \n", $output);

        ob_start();
        Runner::run4();
        $output = ob_get_contents();
        ob_end_clean();
        $expected = <<<EXPECTED
title: Shop Catalogue
price: 0.7

EXPECTED;
        self::assertEquals($output, $expected);

    }
}
