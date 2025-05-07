<?php

namespace popp\ch06;

use popp\BaseUnit;
use popp\ch06\batch03\Runner;
use popp\ch03\batch12\ShopProduct;
use popp\ch03\batch12\CdProduct;
use popp\ch03\batch12\BookProduct;

class Ch06Batch03Test extends BaseUnit
{
    public function testRunner()
    {
        $paramsFile = __DIR__ . '/../../src/ch06/batch03/params.xml';

        if (file_exists($paramsFile)) {
            unlink($paramsFile);
        }

        $val = $this->capture(function() { Runner::run(); });
        self::assertTrue(file_exists($paramsFile));
        $txt = file_get_contents($paramsFile);
        print $val;

        self::assertMatchesRegularExpression("|<key>key1</key>|", $txt);
        self::assertMatchesRegularExpression("|<key>key2</key>|", $txt);
        self::assertMatchesRegularExpression("|<key>key3</key>|", $txt);

        self::assertMatchesRegularExpression("|<val>val1</val>|", $txt);
        self::assertMatchesRegularExpression("|<val>val2</val>|", $txt);
        self::assertMatchesRegularExpression("|<val>val3</val>|", $txt);

        $val = $this->capture(function() { Runner::run2(); });
        // print $val

        self::assertMatchesRegularExpression("/key1/", $val);
        self::assertMatchesRegularExpression("/val1/", $val);

        self::assertMatchesRegularExpression("/key2/", $val);
        self::assertMatchesRegularExpression("/val2/", $val);

        self::assertMatchesRegularExpression("/key3/", $val);
        self::assertMatchesRegularExpression("/val3/", $val);
    }
}