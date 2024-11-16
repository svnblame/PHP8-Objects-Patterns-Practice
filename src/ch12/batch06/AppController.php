<?php declare(strict_types=1);

namespace popp\ch12\batch06;

/* listing 12.25 */
class AppController {
    private static string $defaultCmd  = DefaultCommand::class;
    private static string $defaultView = 'fallback';

    public function getCommand(Request $request): Command
    {
        try {
            $descriptor = $this->getDescriptor($request);
            $cmd = $descriptor->getCommand();
        } catch (AppException $e) {
            $request->addFeedback($e->getMessage());
            return new self::$defaultCmd();
        }

        return $cmd;
    }

    public function getView(Request $request): ViewComponent
    {
        try {
            $descriptor = $this->getDescriptor($request);
            $view = $descriptor->getView($request);
        } catch (AppException $e) {
            return new TemplateViewComponent(self::$defaultView);
        }

        return $view;
    }

    /**
     * @throws AppException
     */
    private function getDescriptor(Request $request): ComponentDescriptor
    {
        $reg = Registry::instance();
        $commands = $reg->getCommands();
        $path = $request->getPath();
        $descriptor = $commands->get($path);

        if (is_null($descriptor)) {
            throw new AppException("no descriptor for {$path}", 404);
        }

        return $descriptor;
    }
}
