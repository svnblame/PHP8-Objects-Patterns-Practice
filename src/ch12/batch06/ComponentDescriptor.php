<?php declare(strict_types=1);

namespace popp\ch12\batch06;

/* listing 12.24 */

use ReflectionException;

class ComponentDescriptor {
    private array $views = [];

    public function __construct(private string $path, private string $cmdStr) {}

    /**
     * @return Command
     * @throws AppException
     * @throws ReflectionException
     */
    public function getCommand(): Command
    {
        $class = $this->cmdStr;

        if (is_null($class)) {
            throw new AppException("unknown class '$class'");
        }

        if (! class_exists($class)) {
            throw new AppException("class '$class' not found");
        }

        $refClass = new \ReflectionClass($class);

        if (! $refClass->isSubclassOf(Command::class)) {
            throw new AppException("command '$class' is not a Command");
        }

        return $refClass->newInstance();
    }

    /**
     * @throws AppException
     */
    public function getView(Request $request): ViewComponent
    {
        $status = $request->getCmdStatus();
        $status = (is_null($status) ? 0 : $status);

        if (isset($this->views[$status])) {
            return $this->views[$status];
        }

        if (isset($this->views[0])) {
            return $this->views[0];
        }

        throw new AppException("no view found");
    }

    /**
     * @throws AppException
     */
    public function setView(int $status, ViewComponent $view): void
    {
        $this->views[$status] = $view;
    }
}
