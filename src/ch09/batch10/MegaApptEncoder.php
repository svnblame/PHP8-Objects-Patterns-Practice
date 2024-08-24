<?php

namespace popp\ch09\batch10;

use popp\ch09\batch10\ApptEncoder;

class MegaApptEncoder extends ApptEncoder
{
    public function encode(): string
    {
        return "Appointment data encoded in MegaCal format\n";
    }
}
