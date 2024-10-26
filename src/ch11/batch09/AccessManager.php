<?php declare(strict_types=1);

namespace popp\ch11\batch09;

class AccessManager {
    public function login(string $user, string $pass): User
    {
        return new User($user);
    }
}
