<?php declare(strict_types=1);

namespace popp\ch12\batch05;

use Throwable;

class AppException extends \Exception {
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}
