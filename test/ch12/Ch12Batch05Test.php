<?php declare(strict_types=1);

namespace ch12;

use popp\test\BaseUnit;
use popp\ch12\batch05\Runner;
use popp\ch12\batch05\AppException;
use popp\ch12\batch05\TestRequest;
use popp\ch12\batch05\Registry;
use popp\ch12\batch05\Conf;

class Ch12Batch05Test extends BaseUnit {
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });

        self::assertMatchesRegularExpression('/Welcome to WOO/', $val);

        $e = new AppException();
        self::assertInstanceOf(AppException::class, $e);
    }

    public function testRegistry() {
        $request  = new TestRequest();
        $registry = Registry::instance();
        $registry->setRequest($request);

        $conf = $registry->getConf();
        self::assertInstanceOf(Conf::class, $conf);
    }


}
