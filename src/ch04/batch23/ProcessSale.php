<?php declare(strict_types=1);

namespace popp\ch04\batch23;

/* listing 04.111, page 143 */
class ProcessSale
{
    private array $callbacks;

    public function registerCallback(callable $callback): void
    {
        $this->callbacks[] = $callback;
    }

    public function sale(Product $product): void
    {
        print "{$product->getName()}: processing\n";
        foreach ($this->callbacks as $callback) {
            call_user_func($callback, $product);
        }
    }
}
