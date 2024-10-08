<?php declare(strict_types=1);

namespace popp\ch10\batch07;

/* listing 10.36 */
class StructureRequest extends DecorateProcess
{
    public function process(RequestHelper $request): void
    {
        print __CLASS__ . ": structuring request data\n";
        $this->processRequest->process($request);
    }
}
