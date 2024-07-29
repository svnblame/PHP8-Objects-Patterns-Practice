<?php declare(strict_types=1);

namespace popp\ch05\batch06;

class Delegator
{
    private OtherShop $thirdPartyShop;

    public function __construct()
    {
        $this->thirdPartyShop = new OtherShop();
    }

    /* listing 05.59 */
    public function __call(string $method, array $args): mixed
    {
        if (method_exists($this->thirdPartyShop, $method)) {
            return $this->thirdPartyShop->$method();
        }
    }
}