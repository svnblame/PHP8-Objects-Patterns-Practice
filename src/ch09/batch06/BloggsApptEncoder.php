<?php

namespace popp\ch09\batch06;

use popp\ch09\batch06\ApptEncoder;

class BloggsApptEncoder extends ApptEncoder
{

    public function encode(): string
    {
        return "Appointment data encoded in BloggsCal format\n";
    }
}
