<?php declare(strict_types=1);

namespace popp\ch04\batch05;

/* listing 04.21, page 92 */
class Consultancy extends TimedService implements Bookable, Chargeable 
{
    public function getPrice(): float 
    {
        return 5.5;
    }
}
