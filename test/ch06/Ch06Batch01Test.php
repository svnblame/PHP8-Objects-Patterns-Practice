<?php

namespace popp\ch06;

use popp\BaseUnit;
use popp\ch06\batch01\ShopProduct;
use popp\ch06\batch01\Runner;

class Ch06Batch01Test extends BaseUnit
{
    public function testRunner()
    {
        $test1 = new ShopProduct('booktitle', 'first', 'main', 99, 200);

        self::assertEquals('first main', $test1->getProducer());
        self::assertEquals(200, $test1->getNumberOfPages());
        self::assertEquals('booktitle ( main, first ): page count - 200', $test1->getSummaryLine());

        $val = $this->capture(function() { Runner::run(); });
        self::assertMatchesRegularExpression('/key1/', $val);
        self::assertMatchesRegularExpression('/val1/', $val);

        self::assertMatchesRegularExpression('/key2/', $val);
        self::assertMatchesRegularExpression('/val2/', $val);

        self::assertMatchesRegularExpression('/key3/', $val);
        self::assertMatchesRegularExpression('/val3/', $val);
    }
}
