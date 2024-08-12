<?php declare(strict_types = 1);

namespace popp\ch08\batch02;

/* listing 08.14 */
abstract class Notifier
{
    public static function getNotifier(): Notifier
    {
        // acquire concrete class according to config or other logic

        if (rand(1, 2) === 1) {
            return new MailNotifier();
        } else {
            return new TextNotifier();
        }
    }

    abstract public function notify($message): void;
}
