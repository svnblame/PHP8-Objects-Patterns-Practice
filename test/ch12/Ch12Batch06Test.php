<?php declare(strict_types=1);

namespace ch12;

use popp\test\BaseUnit;
use popp\ch12\batch06\Runner;
use popp\ch12\batch06\TestRequest;
use popp\ch12\batch06\Registry;
use popp\ch12\batch06\Conf;
use popp\ch12\batch06\Request;


class Ch12Batch06Test extends BaseUnit {
    protected function setUp(): void
    {
        Registry::reset();
    }

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });

        self::assertMatchesRegularExpression('/Welcome to WOO/', $val);
    }

    public function testRegistry()
    {
        $request = new TestRequest();
        $registry = Registry::instance();
        $registry->setRequest($request);

        $config = $registry->getConf();
        self::assertTrue($config instanceof Conf);

        $request = $registry->getRequest();
        self::assertTrue($request instanceof Request);
    }
}
