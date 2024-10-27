<?php declare(strict_types=1);

namespace ch12;

use popp\ch12\batch01\AppException;
use popp\test\BaseUnit;
use popp\ch12\batch01\ApplicationHelper;

class Ch12Batch01Test extends BaseUnit {
    /**
     * @throws AppException
     */
    public function testRunner()
    {
        $helper = new ApplicationHelper();
        $options = $helper->getOptions();

        self::assertEquals('sqlite:./data/woo.db', $options[0]);
    }
}
