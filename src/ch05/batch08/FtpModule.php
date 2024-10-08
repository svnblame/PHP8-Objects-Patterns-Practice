<?php declare(strict_types = 1);

namespace popp\ch05\batch08;

use popp\ch05\batch08\Module;

class FtpModule implements Module
{
    public function setHost(string $host): void
    {
        print "FtpModule::setHost(): $host\n";
    }

    public function setUser(string|int $user): void
    {
        print "FtpModule::setUser(): $user\n";
    }

    public function execute(): void
    {
        // do things
    }
}