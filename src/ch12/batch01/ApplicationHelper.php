<?php declare(strict_types=1);

namespace popp\ch12\batch01;

/* listing 12.01 */
class ApplicationHelper {
    public function getOptions(): array
    {
        $optionFile = __DIR__ . '/data/woo_options.xml';

        if (!file_exists($optionFile)) {
            throw new AppException('Couuld not find options file');
        }

        $options = \simplexml_load_file($optionFile);
        $dsn = (string)$options->dsn;

        // what do we do with this now?
        // ...

        return [$dsn];
    }
}
