<?php declare(strict_types=1);

namespace popp\ch12\batch05;

/* listing 12.11 */
class ApplicationHelper {
    private string $config = __DIR__ . "/data/woo_options.ini";
    private Registry $registry;

    public function __construct()
    {
        $this->registry = Registry::instance();
    }

    public function init(): void
    {
        $this->setupOptions();

        if (defined('STDIN')) {
            $request = new CliRequest();
        } else {
            $request = new HttpRequest();
        }

        $this->registry->setRequest($request);
    }

    private function setupOptions(): void
    {
        if (!file_exists($this->config)) {
            throw new AppException("Could not find options file");
        }

        $options = parse_ini_file($this->config, true);

        $this->registry->setConf(new Conf($options['config']));
        $this->registry->setCommands(new Conf($options['commands']));
    }
}
