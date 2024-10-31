<?php declare(strict_types=1);

namespace ch12;

use popp\test\BaseUnit;
use popp\ch12\batch05\Runner;
use popp\ch12\batch05\AppException;
use popp\ch12\batch05\TestRequest;
use popp\ch12\batch05\Registry;
use popp\ch12\batch05\Conf;
use popp\ch12\batch05\ApplicationHelper;

class Ch12Batch05Test extends BaseUnit {
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });

        self::assertMatchesRegularExpression('/Welcome to WOO/', $val);

        $e = new AppException();
        self::assertInstanceOf(AppException::class, $e);
    }

    public function testRegistry()
    {
        $request  = new TestRequest();
        $registry = Registry::instance();
        $registry->setRequest($request);

        $conf = $registry->getConf();
        self::assertInstanceOf(Conf::class, $conf);
    }

    public function testApplicationHelper()
    {
        $helper = new ApplicationHelper();
        $helper->init();

        $registry = Registry::instance();
        $dsn = $registry->getDSN();

        self::assertEquals("sqlite:/Users/gene/code/p8opp/src/ch12/batch05/data/woo.db", $dsn);
    }
}
