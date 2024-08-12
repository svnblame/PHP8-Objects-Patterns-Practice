<?php declare(strict_types = 1);

namespace popp\ch08\batch02;

/* listing 08.13 */
class RegistrationMgr
{
    public function register(Lesson $lesson): void
    {
        // do something with this lesson

        // send notification
        $notifier = Notifier::getNotifier();
        $notifier->notify("new lesson: cost ({$lesson->cost()})");
    }
}
