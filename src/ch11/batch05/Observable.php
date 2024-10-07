<?php declare(strict_types=1);

namespace popp\ch11\batch05;

/* listing 11.25 */
interface Observable {
    public function attach(Observer $observable): void;
    public function detach(Observer $observable): void;
    public function notify(): void;
}
