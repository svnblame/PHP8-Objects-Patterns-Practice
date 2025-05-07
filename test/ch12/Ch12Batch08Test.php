<?php declare(strict_types=1);

namespace popp\ch12;

use popp\BaseUnit;
use popp\ch12\batch08\Runner;
use popp\ch12\batch08\PageController;
use popp\ch12\batch06\Request;

class Ch12Batch08Test extends BaseUnit {
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertMatchesRegularExpression('/choose a name for the venue/', $val);

        $val = $this->capture(function() { Runner::run2(); });
        self::assertMatchesRegularExpression('/name is a required field/', $val);

        $val = $this->capture(function() { Runner::run3(); });
        self::assertMatchesRegularExpression("/this is fallback/", $val);
    }

    public function testPageController()
    {
        $test = new class extends PageController {
            public function process(): void {}
        };
        $controller = new $test();
        $controller->init();
        $request = $controller->getRequest();
        self::assertInstanceOf(Request::class, $request);

        ob_start();
        $controller->forward(__DIR__.'/error.php');
        $output = ob_get_clean();
        self::assertEquals("this is fallback\n", $output);
    }
}
