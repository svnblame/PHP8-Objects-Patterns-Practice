<?php declare(strict_types=1);

namespace popp\ch12;

use popp\ch12\batch04\TreeBuilder;
use popp\BaseUnit;
use popp\ch12\batch04\Runner;
use popp\ch12\batch04\Registry;
use popp\ch12\batch04\Request;
use popp\ch12\batch04\MockRegistry;

class Ch12Batch04Test extends BaseUnit {
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertMatchesRegularExpression('/TreeBuilder/', $val);
    }

    public function testRunner2()
    {
        $registry  = Registry::instance();
        $registry2 = Registry::instance();

        $request = $registry2->getRequest();
        self::assertTrue($request instanceof Request);

        $tb = $registry2->treeBuilder();
        self::assertTrue($tb instanceof TreeBuilder);

        Registry::testMode();
        $mockRegistry = Registry::instance();
        self::assertTrue($mockRegistry instanceof MockRegistry);

        Registry::testMode(false);
        $registry4 = Registry::instance();
        self::assertFalse($registry4 instanceof MockRegistry);
        self::assertTrue($registry4 instanceof Registry);
    }
}
