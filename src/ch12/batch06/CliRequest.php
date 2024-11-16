<?php declare(strict_types=1);

namespace popp\ch12\batch06;

class CliRequest extends Request
{
    protected function init(): void
    {
        $args = $_SERVER['argv'];

        foreach ($args as $arg) {
            if (preg_match("/^path:(\S+)/", $arg, $matches)) {
                $this->path = $matches[1];
            } else {
                if (strpos($arg, '=')) {
                    list($key, $value) = explode('=', $arg);
                    $this->setProperty($key, $value);
                }
            }
        }

        $this->path = (empty($this->path)) ? '/' : $this->path;
    }

    /* listing 12.30 */
    public function forward(string $path): void
    {
        // tack the new path onto the end of the argument list
        // last argument wins
        $_SERVER['argv'][] = "path:{$path}";
        Registry::reset();
        Controller::run();
    }
}
