<?php declare(strict_types=1);

namespace popp\ch10\batch07;

class LogRequest extends DecorateProcess
{
    public function process(RequestHelper $request): void
    {
        print __CLASS__ . ": logging request\n";
        $this->processRequest->process($request);
    }
}
