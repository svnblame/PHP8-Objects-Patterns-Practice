<?php

namespace popp\ch09\batch07;

class MegaApptEncoder extends ApptEncoder
{

    public function encode(string $data): string
    {
        return "Appointment data encoded in MegaCal format\n";
    }
}
