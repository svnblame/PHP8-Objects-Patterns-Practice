<?php

namespace popp\ch03\batch08;

class AddressManager
{
    private $addresses = [ "209.131.36.159", "216.58.213.174" ];

    /* listing 03.27 */
    public function outputAddresses($resolve) {
        if (! is_bool($resolve)) {
            // do something drastic
            return false;
        }

        return true;
    }
}
