<?php declare(strict_types=1);

namespace popp\ch12\batch06;

/* listing 12.27 */
class TemplateViewComponent implements ViewComponent
{
    public function __construct(private string $name) {}

    /**
     * @throws AppException
     */
    public function render(Request $request): void
    {
        $registry = Registry::instance();
        $config = $registry->getConf();
        $path = $config->get('templatePath');

        if (is_null($path)) {
            throw new AppException('no template directory');
        }

        $fullPath = "{$path}/{$this->name}.php";

        if (! file_exists($fullPath)) {
            throw new AppException("no template at {$fullPath}");
        }

        include($fullPath);
    }
}
