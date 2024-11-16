<?php declare(strict_types=1);

namespace popp\ch12\batch06;

/* listing 12.23 */
class ViewComponentCompiler {
    private static string $defaultCmd = DefaultCommand::class;

    public function parseFile(string $file): Conf
    {
        $options = \simplexml_load_file($file);

        return $this->parse($options);
    }

    /**
     * @throws AppException
     */
    public function parse(\SimpleXMLElement $options): Conf {
        $conf = new Conf();

        foreach ($options->control->command as $command) {
            $path = (string) $command['path'];
            $cmdStr = (string) $command['class'];
            $path = $path ?? '/';
            $cmdStr = (empty($cmdStr)) ? self::$defaultCmd : $cmdStr;
            $pathObj = new ComponentDescriptor($path, $cmdStr);

            $this->processView($pathObj, 0, $command);

            if (isset($command->status) && isset($command->status['value'])) {
                foreach ($command->status as $s) {
                    $status = (string) $s['value'];
                    $statusVal = constant(Command::class . '::' . $status);

                    if ($statusVal === null) {
                        throw new AppException("Unknown status: {$status}");
                    }

                    $this->processView($pathObj, $statusVal, $s);
                }
            }

            $conf->set($path, $pathObj);
        }

        return $conf;
    }

    /**
     * @throws AppException
     */
    public function processView(ComponentDescriptor $pathObj, int $statusVal, \SimpleXMLElement $el): void
    {
        if (isset($el->view) && isset($el->view['name'])) {
            $pathObj->setView($statusVal, new TemplateViewComponent((string)$el->view['name']));
        }

        if (isset($el->forward) && isset($el->forward['path'])) {
            $pathObj->setView($statusVal, new ForwardViewComponent((string)$el->forward['path']));
        }
    }
}