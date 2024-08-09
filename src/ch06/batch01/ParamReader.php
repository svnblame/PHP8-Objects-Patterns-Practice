<?php

namespace popp\ch06\batch01;

/* listing 06.01 */
function readParams(string $source): array
{
    $params = [];

    // read text parameters from $source file
    $fh = fopen($source, 'r') or die("Problem reading from $source");

    while (! feof($fh)) {
        $line = trim(fgets($fh));

        if (! preg_match('/:/', $line)) {
            continue;
        }

        list($key, $value) = explode(':', $line, 2);

        if (! empty($key)) {
            $params[$key] = $value;
        }
    }
    fclose($fh);

    return $params;
}

function writeParams(array $params, string $source): void
{
    // write text to $source file
    /* listing 06.01 */
    $fh = fopen($source, 'w') or die("Problem writing to $source");

    foreach ($params as $key => $value) {
        fputs($fh, "$key: $value\n");
    }

    fclose($fh);
}
