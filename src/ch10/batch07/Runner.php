<?php declare(strict_types=1);

namespace popp\ch10\batch07;

class Runner {
    public static function run(): void
    {
        /* listing 10.37 */
        $processor = new AuthenticateRequest(
            new StructureRequest(
                new LogRequest(
                    new MainProcess()
                )
            )
        );

        $processor->process(new RequestHelper());
    }
}
