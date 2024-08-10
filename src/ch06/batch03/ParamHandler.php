<?php declare(strict_types=1);

namespace popp\ch06\batch03;

/* listing 06.04 */

use Exception;

abstract class ParamHandler
{
    protected array $params = [];

    public function __construct(protected string $source) {}

    public static function getInstance(string $filename): ParamHandler
    {
        if (preg_match("/\.xml$/i", $filename)) {
            return new XmlParamHandler($filename);
        }
        return new TextParamHandler($filename);
    }

    public function addParam(string $key, string $value) : void
    {
        $this->params[$key] = $value;
    }

    public function getAllParams(): array
    {
        return $this->params;
    }

    /**
     * @throws Exception
     */
    protected function openSource(string $flag): mixed
    {
        $fh = @fopen($this->source, $flag);
        if (empty($fh)) {
            throw new Exception("Could not open source file '{$this->source}'.");
        }
        return $fh;
    }

    abstract public function write(): void;
    abstract public function read(): void;
}
