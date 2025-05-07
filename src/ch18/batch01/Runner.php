<?php declare(strict_types=1);

namespace popp\ch18\batch01;

class Runner
{
    public static function run(): void
    {
        /* listing 18.02 */
        $store = new UserStore();

        $store->addUser(
            'bob williams',
            'bob@example.com',
            '12345'
        );
        $store->notifyPasswordFailure('bob@example.com');
        $user = $store->getUser('bob@example.com');
        print_r($user);
    }
}
