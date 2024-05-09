<?php declare(strict_types=1);

namespace popp\test\ch03;

require_once 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use popp\ch03\batch14\Storage;
use popp\ch03\batch14\ShopProduct;
use popp\ch03\batch14\BookProduct;
use popp\ch03\batch14\CdProduct;
use popp\ch03\batch14\ShopProductWriter;

class Batch14Test extends TestCase
{
    public function testStorage()
    {
        $s = new Storage();
        list($key, $value) = $s->add("key", "value");
        self::assertEquals($key, "key");
        self::assertEquals($value, "value");

        list($key, $value) = $s->add("key2", null);
        self::assertEquals($key, "key2");
        self::assertNull($value);

        $product = new BookProduct("booktitle", "first", "main", 99, 200);
        self::assertEquals($product, $s->setShopProduct($product));
        self::assertEquals(null, $s->setShopProduct(null));

        self::assertEquals($product, $s->setShopProduct2($product));
        self::assertEquals(null, $s->setShopProduct2(false));
    }

    public function testStorageTypeErrorIsThrown()
    {
        $s = new Storage();

        $this->expectException(\TypeError::class);

        $s->add("key", 9);
    }

    public function testShopProductTypeErrorIsThrown()
    {
        $s = new Storage();

        $this->expectException(\TypeError::class);

        self::assertEquals("bob", $s->setShopProduct("bob"));
    }

    public function testShopProduct()
    {
        $book1 = new BookProduct("booktitle", "first", "main", 99, 200);
        self::assertEquals("booktitle ( main, first ): page count - 200", $book1->getSummaryLine());

        $book2 = new BookProduct("booktitle", "first", "main", 99, 200);
        $book2->setDiscount(10);
        self::assertEquals($book2->getPrice(), 99);

        $cd = new CdProduct("cdtitle", "first", "main", 99, 200);
        $cd->setDiscount(10);
        self::assertEquals($cd->getPrice(), 89);

        $writer = new ShopProductWriter();
        $writer->addProduct($book2);
        $writer->addProduct($cd);

        ob_start();
        $writer->write();
        $output = ob_get_contents();
        ob_end_clean();
        self::assertEquals($output, "booktitle: first main (99)\ncdtitle: first main (89)\n");
    }
}
