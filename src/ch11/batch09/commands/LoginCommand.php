<?php declare(strict_types=1);

namespace popp\ch11\batch09\commands;

use popp\ch11\batch09\Command;
use popp\ch11\batch09\CommandContext;
use popp\ch11\batch09\Registry;

/* listing 11.49 */
class LoginCommand extends Command
{
    public function execute(CommandContext $context): bool
    {
        $manager = Registry::getAccessManager();
        $user = $context->get('username');
        $pass = $context->get('pass');
        $userObj = $manager->login($user, $pass);

        if (is_null($userObj)) {
            $context->setError($manager->getError());
            return false;
        }

        $context->addParam('user', $userObj);

        return true;
    }
}
