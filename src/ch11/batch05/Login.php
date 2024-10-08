<?php declare(strict_types=1);

namespace popp\ch11\batch05;

/* listing 11.26 */
class Login implements Observable
{
    private array $observers = [];
    private array $status = [];

    public const LOGIN_USER_UNKNOWN = 1;
    public const LOGIN_WRONG_PASS   = 2;
    public const LOGIN_ACCESS       = 3;

    public function attach(Observer $observer): void
    {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer): void
    {
        $this->observers = array_filter(
            $this->observers,
            function ($a) use ($observer) {
                return (! ($a === $observer));
            }
        );
    }

    public function notify(): void
    {
        foreach ($this->observers as $obs) {
            $obs->update($this);
        }
    }

    /* listing 11.27 */
    public function handleLogin(string $user, string $pass, string $ip): bool
    {
        $isValid = false;

        switch (rand(1,3)) {
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
