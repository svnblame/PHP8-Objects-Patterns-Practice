<?php

namespace popp\ch11\batch06;

use SplObserver;

class Login implements \SplSubject
{
    private \SplObjectStorage $storage;

    /* listing 11.35 */
    public const LOGIN_USER_UNKNOWN = 1;
    public const LOGIN_WRONG_PASS   = 2;
    public const LOGIN_ACCESS       = 3;
    private array $status = [];

    public function __construct()
    {
        $this->storage = new \SplObjectStorage();
    }

    /**
     * @inheritDoc
     */
    public function attach(SplObserver $observer): void
    {
        $this->storage->attach($observer);
    }

    /**
     * @inheritDoc
     */
    public function detach(SplObserver $observer): void
    {
        $this->storage->detach($observer);
    }

    /**
     * @inheritDoc
     */
    public function notify(): void
    {
        foreach ($this->storage as $observer) {
            $observer->update($this);
        }
    }

    /* listing 11.35 */
    public function handleLogin(string $user, string $pass, string $ip): bool
    {
        $isValid = false;

        switch (rand(1, 3)) {
            case 1:
                $this->setStatus(self::LOGIN_ACCESS, $user, $ip);
                $isValid = true;
                break;
            case 2:
                $this->setStatus(self::LOGIN_WRONG_PASS, $user, $ip);
                $isValid = false;
                break;
            case 3:
                $this->setStatus(self::LOGIN_USER_UNKNOWN, $user, $ip);
                $isValid = false;
                break;
        }

        $this->notify();

        return $isValid;
    }

    private function setStatus(int $status, string $user, string $ip): void
    {
        $this->status = [ $status, $user, $ip ];
    }

    public function getStatus(): array
    {
        return $this->status;
    }
}
