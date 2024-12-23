<?php declare(strict_types=1);

namespace popp\ch12\batch06;

use Throwable;

class AppException extends \Exception {
    public function __construct(string $message = "", int $code = 0, Throwable|null $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
