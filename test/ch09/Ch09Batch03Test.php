<?php declare(strict_types = 1);

namespace popp\test\ch09;

use popp\ch04\batch02\ShopProduct;
use popp\ch04\batch02\DbGenerate;
use popp\test\BaseUnit;
use popp\ch09\batch03\Runner;

class Ch09Batch03Test extends BaseUnit
{
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });

        $test = "mary: (I'll call my dad)|(I'll call my lawyer)|(I'll clear my desk)";
        self::assertMatchesRegularExpression("/$test/", $val);

        $test = "bob: (I'll call my dad)|(I'll call my lawyer)|(I'll clear my desk)";
        self::assertMatchesRegularExpression("/$test/", $val);

        $test = "harry: (I'll call my dad)|(I'll call my lawyer)|(I'll clear my desk)";
        self::assertMatchesRegularExpression("/$test/", $val);
    }

    function testShopProductGenerate()
    {
        $dbgen = new DbGenerate();
        $pdo = $dbgen->getPDO();

        $obj = ShopProduct::getInstance(1, $pdo);
        self::assertEquals('my antonia', $obj->getTitle());

        $obj = ShopProduct::getInstance(2, $pdo);
        self::assertEquals('london calling', $obj->getTitle());

        $obj = ShopProduct::getInstance(3, $pdo);
        self::assertEquals('soap', $obj->getTitle());
    }
}
