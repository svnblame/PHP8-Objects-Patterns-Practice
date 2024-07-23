<?php

namespace popp\ch05\batch04\util;

class InSame
{
    public static function run(): void
    {
        Debug::helloWorld();
    }

    public static function runError(): void
    {
        \popp\ch05\batch04\util\Debug::helloWorld();
    }
}
