<?php

namespace popp\ch03\batch06;

class AddressManager
{
    private $addresses = [ "209.131.36.159", "216.58.213.174" ];

    /* listing 03.25 */
    public function outputAddresses($resolve)
    {
        if (is_string($resolve)) {
            $resolve = (preg_match("/^(false|no|off)$/i", $resolve)) ? false : true;
        }

        foreach ($this->addresses as $address) {
            print $address;
            if ($resolve) {
                print " (" . gethostbyaddr($address) . ")";
            }
            print "\n";
        }
    }
}
