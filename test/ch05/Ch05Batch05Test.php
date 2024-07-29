<?php declare(strict_types=1);

namespace popp\test\ch05;

use Exception;
use popp\test\BaseUnit;
use popp\ch05\batch05\Runner;

class Ch05Batch05Test extends BaseUnit
{
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::runBefore(); });

        $expected = <<<EXPECTED
hello

EXPECTED;

        self::assertEquals($expected, $val);

        $val = $this->capture(/** * @throws Exception */ function() { Runner::run(); });

        self::assertEquals($expected, $val);

        $val = $this->capture(function() { Runner::run2(); });

        $expected = <<<EXPECTED
\$product is a CdProduct object
\$product is an instance of CdProduct

EXPECTED;

        self::assertEquals($expected, $val);

        $val = $this->capture(function() { Runner::run3(); });

        $expected = <<<EXPECTED
popp\ch05\batch05\util\Writer
popp\ch05\batch05\util\db\Querier
popp\ch05\batch05\Local

EXPECTED;

        self::assertEquals($expected, $val);

        $val = $this->capture(function() { Runner::run4(); });

        $expected = <<<EXPECTED
Array
(
    [0] => __construct
    [1] => getNumberOfPages
    [2] => getSummaryLine
    [3] => getPrice
    [4] => setID
    [5] => getProducerFirstName
    [6] => getProducerMainName
    [7] => setDiscount
    [8] => getDiscount
    [9] => getTitle
    [10] => getProducer
    [11] => getInstance
)

EXPECTED;

        self::assertEquals($expected, $val);

        $val = $this->capture(function() { Runner::run5(); });

        $expected = <<<EXPECTED
fake titlefake titlefake titlefake titleArray
(
    [coverUrl] => cover url
)
popp\ch04\batch02\ShopProductBookProduct is a subclass of ShopProduct

EXPECTED;

        self::assertEquals($expected, $val);
    }

    public function testRunDeclared()
    {
        $val = $this->capture(function() { Runner::runDeclared(); });
        self::assertMatchesRegularExpression("/ErrorException/", $val);
    }

    public function testRunObjClass()
    {
        $val = $this->capture(function() { Runner::runObjClass(); });

        $expected = <<<EXPECTED
popp\ch04\batch02\BookProduct
EXPECTED;

        self::assertEquals($expected, $val);
    }

    public function testRunLocal()
    {
        $val = $this->capture(function() { Runner::runLocal(); });

        $expected = <<<EXPECTED
util\Writer
util\db\Querier
mypackage\Local

EXPECTED;

        self::assertEquals($expected, $val);
    }

    public function testRunClassMethods()
    {
        $val = $this->capture(function () {
            Runner::runClassMethods();
        });
        self::assertMatchesRegularExpression("/getProducerFirstName/", $val);
    }

    public function testRunClassVars()
    {
        $val = $this->capture(function () { Runner::runClassVars(); });
        self::assertMatchesRegularExpression("/coverUrl/", $val);
    }

    public function testRunGetParentClass()
    {
        $val = $this->capture(function() { Runner::runGetParentClass(); });
        self::assertEquals('popp\ch04\batch02\ShopProduct', $val);
    }
}
