<?php

namespace popp\ch11\batch02;

use JetBrains\PhpStorm\NoReturn;

class Runner {
    #[NoReturn]
    public static function run(): void
    {
        /* listing 11.21 */
        $markers = [
            new RegexpMarker("/f.ve/"),
            new MatchMarker("five"),
            new MarkLogicMarker('$input equals "five"')
        ];

        foreach ($markers as $marker) {
            print get_class($marker) . "\n";

            $question = new TextQuestion("how many beans make five", $marker);

            foreach (['five', 'four'] as $response) {
                print "    response: $response: ";

                if ($question->mark($response)) {
                    print "well done\n";
                } else {
                    print "never mind\n";
                }
            }
        }
    }
}
