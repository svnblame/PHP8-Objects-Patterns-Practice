<?php declare(strict_types=1);

namespace popp\ch12;

use popp\ch12\batch05\CommandResolver;
use popp\BaseUnit;
use popp\ch12\batch05\Runner;
use popp\ch12\batch05\AppException;
use popp\ch12\batch05\TestRequest;
use popp\ch12\batch05\Registry;
use popp\ch12\batch05\Conf;
use popp\ch12\batch05\ApplicationHelper;
use popp\ch12\batch05\DefaultCommand;

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

    public function testCommandResolver()
    {
        // set up basics
        $request = new TestRequest();
        $registry = Registry::instance();
        $registry->setRequest($request);

        $commands = new Conf();
        $resolver = new CommandResolver();

        // no path set
        $registry->setCommands($commands);
        $command = $resolver->getCommand($request);
        $feedback = $request->getFeedback();

        self::assertEquals("path '/' not matched", $feedback[0]);
        self::assertInstanceOf(DefaultCommand::class, $command);

        // no-matching path
        $request->clearFeedback();
        $request->setPath('/testcmd');
        $command = $resolver->getCommand($request);
        $feedback = $request->getFeedback();

        self::assertEquals("path '/testcmd' not matched", $feedback[0]);
        self::assertInstanceOf(DefaultCommand::class, $command);

        // matching path but no class
        $request->clearFeedback();
        $commands->set('/testcmd', '\\popp\\ch12\\batch05\\NoSuchClass');
        $request->setPath('/testcmd');
        $command = $resolver->getCommand($request);
        $feedback = $request->getFeedback();

        self::assertEquals("class '\\popp\\ch12\\batch05\\NoSuchClass' not found", $feedback[0]);
        self::assertInstanceOf(DefaultCommand::class, $command);

        // matching path and existing class
        $request->clearFeedback();
        $commands->set('/testcmd', '\\popp\\ch12\\TestCommandBatch05');
        $request->setPath('/testcmd');
        $command = $resolver->getCommand($request);
        $feedback = $request->getFeedback();

        self::assertCount(0, $feedback);
        self::assertInstanceOf(TestCommandBatch05::class, $command);
    }
}
