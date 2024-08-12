<?php declare(strict_types = 1);

namespace popp\ch08\batch02;

/* listing 08.15 */
class MailNotifier extends Notifier
{
    public function notify($message): void
    {
        print "MAIL notification: {$message}\n";
    }
}
