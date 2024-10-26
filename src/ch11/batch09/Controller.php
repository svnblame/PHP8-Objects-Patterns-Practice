<?php declare (strict_types=1);

namespace popp\ch11\batch09;

/* listing 11.52 */
class Controller {
    private CommandContext $context;

    public function __construct()
    {
        $this->context = new CommandContext();
    }

    public function getContext(): CommandContext
    {
        return $this->context;
    }

    public function process(): void
    {
        $action = $this->context->get('action');
        $action = (is_null($action)) ? 'default' : $action;

        $command = CommandFactory::getCommand($action);

        if (! $command->execute($this->context)) {
            // handle failure
        }

        // success
        // dispatch view
    }
}
