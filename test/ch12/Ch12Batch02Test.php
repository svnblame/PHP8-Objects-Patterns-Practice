<?php declare(strict_types=1);

namespace ch12;

use popp\ch12\batch02\Registry;
use popp\ch12\batch02\Request;
use popp\test\BaseUnit;
use popp\ch12\batch02\Runner;

class Ch12Batch02Test extends BaseUnit {
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertMatchesRegularExpression('/Request/', $val);
    }

    public function testRegistry()
    {
        $registry = Registry::instance();
        $request  = $registry->getRequest();
        self::assertInstanceOf(Request::class, $request);
    }
}
