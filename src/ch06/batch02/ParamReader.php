<?php

/* listing 06.03 && 06.10 */
function readParams(string $source): array
{
    $params = [];

    if (preg_match("/\.xml$/i", $source)) {
        // read XML parameters from $source file
        $el = simplexml_load_file($source);

        foreach ($el->param as $param) {
            $params["$param->key"] = "$param->val";
        }
    } else {
        // read text parameters from $source file
        $fh = fopen($source, "r");

        while (! feof($fh)) {
            $line = trim(fgets($fh));

            if (! preg_match("/:/", $line)) {
                continue;
            }

            list($key, $value) = explode(":", $line, 2);

            if (! empty($key)) {
                $params["$key"] = $value;
            }
        }

        fclose($fh);
    }

    return $params;
}

function writeParams(array $params, string $source): void
{
    /* listing 06.03 && 06.10 */
    $fh = fopen($source, "w");

    if (preg_match("/\.xml$/i", $source)) {
        // write XML parameters to $source file
        fputs($fh, "<params>\n");

        foreach ($params as $key => $val) {
            fputs($fh, "\t<param>\n");
            fputs($fh, "\t\t<key>$key</key>\n");
            fputs($fh, "\t\t<val>$val</val>\n");
            fputs($fh, "\t</param>\n");
        }

        fputs($fh, "</params>\n");
    } else {
        foreach ($params as $key => $val) {
            fputs($fh, "$key:$val\n");
        }
    }

    fclose($fh);
}