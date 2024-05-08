<?php declare(strict_types=1);

namespace popp;

final class Logger
{
    public static function get(): mixed
    {
        $logFile = AppConfig::get('log');

        var_dump(file_exists($logFile));

        if (! file_exists($logFile)) {
            touch($logFile);
        }

        unlink($logFile);
        touch($logFile);

        return fopen($logFile, 'a');
    }
}
