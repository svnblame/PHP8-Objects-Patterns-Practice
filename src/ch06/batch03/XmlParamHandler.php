<?php declare(strict_types=1);

namespace popp\ch06\batch03;

use popp\ch06\batch03\ParamHandler;

/* listing 06.05 */
class XmlParamHandler extends ParamHandler
{

    public function write(): void
    {
        // write XML using $this->params
        /* listing 06.05 */
        $fh = $this->openSource('w');
        fputs($fh, "<params>\n");
        foreach ($this->params as $key => $val) {
            fputs($fh, "\t<param>\n");
            fputs($fh, "\t\t<key>$key</key>\n");
            fputs($fh, "\t\t<val>$val</val>\n");
            fputs($fh, "\t</param>\n");
        }
        fputs($fh, "</params>\n");
        fclose($fh);
    }

    public function read(): void
    {
        // TODO: Implement read() method.
    }
}