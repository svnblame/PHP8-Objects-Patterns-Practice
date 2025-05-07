<?php declare(strict_types=1);

namespace popp\ch12;

use popp\BaseUnit;
use popp\ch12\batch07\Runner;

class Ch12Batch07Test extends BaseUnit {
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });

        $test = <<<TEST
<html>
<head>
<title>Venues</title>
</head>
<body>
<h1>Venues</h1>

    Likey Lounge<br />
    Happy House<br />

</body>
</html>

TEST;

        self::assertEquals($test, $val);
    }
}
