<?php declare(strict_types=1);

namespace popp\ch04\batch12;

class XmlException extends \Exception 
{
    private \LibXMLError $error;

    public function __construct(\LibXMLError $error) 
    {
        $shortfile = basename($error->file);
        $msg = "[{$shortfile}, line {$error->line}, col {$error->column}] {$error->message}";
        $this->error = $error;
        parent::__construct($msg, $error->code);
    }

    public function getLibXmlError(): \LibXmlError 
    {
        return $this->error;
    }
}