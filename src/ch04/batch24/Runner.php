<?php declare(strict_types=1);

namespace popp\ch04\batch24;

class Runner
{
    /* Anonymous Classes - listing 04.125, page 151 */
    public static function run(): void
    {
        $person = new Person();
        $person->output(
            new class implements PersonWriter {
                public function write(Person $person): void
                {
                    print $person->getName() . " " . $person->getAge() . "\n";
                }
            }
        );
    }

    /* Anonymous Classes - listing 04.126, page 152 */
    public static function run2(): void
    {
        $path = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR .
            DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR. 'logs' . DIRECTORY_SEPARATOR . 'person.log';

        $person = new Person();
        $person->output(
            new class ($path) implements PersonWriter {
                private string $path = '';

                public function __construct(string $path) {
                    $this->path = $path;
                }

                public function write(Person $person): void
                {
                    file_put_contents($this->path, $person->getName() . " " . $person->getAge() . "\n");
                }
            }
        );
    }
}