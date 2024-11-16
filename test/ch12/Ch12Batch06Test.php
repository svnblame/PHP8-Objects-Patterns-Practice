<?php declare(strict_types=1);

namespace ch12;

use popp\ch12\batch06\AppController;
use popp\ch12\batch06\ApplicationHelper;
use popp\ch12\batch06\Command;
use popp\ch12\batch06\ComponentDescriptor;
use popp\ch12\batch06\Conf;
use popp\ch12\batch06\DefaultCommand;
use popp\ch12\batch06\ForwardViewComponent;
use popp\ch12\batch06\Registry;
use popp\ch12\batch06\Request;
use popp\ch12\batch06\Runner;
use popp\ch12\batch06\TemplateViewComponent;
use popp\ch12\batch06\TestRequest;
use popp\ch12\batch06\ViewComponentCompiler;
use popp\test\BaseUnit;


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

    /**
     * @throws \Exception
     */
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

    public function testApplicationHelper()
    {
        $helper = new ApplicationHelper();
        $helper->init();

        $registry = Registry::instance();
        $dsn = $registry->getDSN();

        self::assertEquals("sqlite:/Users/gene/code/p8opp/src/ch12/batch06/data/woo.db", $dsn);
    }

    public function testViewComponentCompiler()
    {
        $config = new Conf();
        $config->set('templatePath', __DIR__);
        $registry = Registry::instance();
        $registry->setConf($config);

        $parser = new ViewComponentCompiler();
        $xml = <<<BLAH
<xx>
<control>
    <command path="/" class="\popp\ch12\batch06\DefaultCommand">
        <view name="main" />
        <status value="CMD_ERROR"> 
            <view name="error" />
        </status>
        <status value="CMD_INSUFFICIENT_DATA"> 
            <forward path="/somewhere/else" />
        </status>
    </command>
</control>
</xx>
BLAH;

        $el = simplexml_load_string($xml);
        $components = $parser->parse($el);

        self::assertTrue(! is_null($components->get('/')));

        $comp = $components->get('/');
        $cmd = $comp->getCommand();

        self::assertTrue($cmd instanceof Command);

        $request = new TestRequest();
        // test default view
        $request->setCmdStatus(Command::CMD_OK);

        $view = $comp->getView($request);
        ob_start();
        $view->render($request);
        $output = ob_get_clean();

        self::assertEquals("this is main\n", $output);

        $request->setCmdStatus(Command::CMD_ERROR);
        $view = $comp->getView($request);
        $view = $comp->getView($request);
        ob_start();
        $view->render($request);
        $output = ob_get_clean();
        self::assertEquals("this is an error\n", $output);

        $request->setCmdStatus(Command::CMD_INSUFFICIENT_DATA);
        $view = $comp->getView($request);
        self::assertTrue($view instanceof ForwardViewComponent);
    }

    public function testApplicationController()
    {
        // set up basics
        $request = new TestRequest();
        $registry = Registry::instance();
        $registry->setRequest($request);

        $commands = new Conf();
        $resolver = new AppController();

        $conf = new Conf();

        $conf->set('templatePath', __DIR__);
        $registry->setConf($conf);

        // no path or command set
        $registry->setCommands($commands);
        $cmd = $resolver->getCommand($request);
        $feedBack = $request->getFeedBack();

        self::assertEquals('no descriptor for /', $feedBack[0]);
        self::assertTrue($cmd instanceof DefaultCommand);

        // no matching path
        $request->clearFeedback();
        $request->setPath('/testCmd');
        $cmd = $resolver->getCommand($request);
        $feedBack = $request->getFeedBack();

        self::assertEquals('no descriptor for /testCmd', $feedBack[0]);
        self::assertTrue($cmd instanceof DefaultCommand);

        // matching path but no class
        $descriptor = new ComponentDescriptor('/testCmd', '\\popp\\NoSuchClass');
        $request->clearFeedback();
        $commands->set('/testCmd', $descriptor);
        $request->setPath('/testCmd');
        $cmd = $resolver->getCommand($request);
        $feedBack = $request->getFeedBack();

        self::assertEquals("class '\\popp\\NoSuchClass' not found", $feedBack[0]);
        self::assertTrue($cmd instanceof DefaultCommand);

        // matching path and existing class
        // - no template matched
        $descriptor = new ComponentDescriptor('/testCmd', '\\popp\\test\\ch12\\TestCommandBatch06');
        $request->clearFeedback();
        $commands->set('/testCmd', $descriptor);
        $request->setPath('/testCmd');
        $cmd = $resolver->getCommand($request);
        $feedBack = $request->getFeedBack();

        self::assertEquals(0, count($feedBack));
        self::assertTrue($cmd instanceof \popp\test\ch12\TestCommandBatch06);

        $view = $resolver->getView($request);

        ob_start();
        $view->render($request);
        $output = ob_get_clean();

        self::assertEquals("this is fallback\n", $output);

        // matching path and existing class
        // - templated matched / default
        $descriptor->setView(Command::CMD_DEFAULT, new TemplateViewComponent('main'));
        $descriptor->setView(Command::CMD_ERROR, new TemplateViewComponent('error'));
        $view = $resolver->getView($request);
        ob_start();
        $view->render($request);
        $output = ob_get_clean();

        self::assertEquals("this is main\n", $output);

        // matching path and existing class
        // - template matched / default
        $request->setCmdStatus(Command::CMD_ERROR);
        $view = $resolver->getView($request);
        ob_start();
        $view->render($request);
        $output = ob_get_clean();

        self::assertEquals("this is an error\n", $output);
    }
}
