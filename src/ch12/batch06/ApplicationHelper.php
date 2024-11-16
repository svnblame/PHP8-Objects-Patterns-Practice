<?php declare(strict_types=1);

namespace popp\ch12\batch06;

class ApplicationHelper {
    private string $config = __DIR__ . '/data/woo_options.ini';
    private Registry $registry;

    public function __construct()
    {
        $this->registry = Registry::instance();
    }

    public function init(): void
    {
        $this->setupOptions();

        if (isset($_SERVER['REQUEST_METHOD'])) {
            $request = new HttpRequest();
        } else {
            $request = new CliRequest();
        }

        $this->registry->setRequest($request);
    }

    /* listing 12.31 */
    private function setupOptions(): void
    {
        if (! file_exists($this->config)) {
            throw new AppException('Could not find options file');
        }

        $options = parse_ini_file($this->config, true);
        $conf = new Conf($options['config']);
        $this->registry->setConf($conf);

        $vcFile = $conf->get('viewComponentFile');
        $cParse = new ViewComponentCompiler();

        $commandAndViewData = $cParse->parseFile($vcFile);
        $this->registry->setCommands($commandAndViewData);
    }
}
