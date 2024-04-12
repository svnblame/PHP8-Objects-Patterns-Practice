<?php declare(strict_types=1);

namespace popp\ch04\batch17;

/* listing 04.85, page 128 */
/* Working with Interceptors (aka overloading, magic methods) */
class Person 
{
    private ?string $myname;
    private ?int $myage;

    public function __set(string $property, mixed $value): void 
    {
        $method = "set{$property}";
        if (method_exists($this, $method)) {
            $this->$method($value);
        }
    }

    /* listing 04.87, page 130 */
    /* Working with Interceptors (aka overloading, magic methods) */
    public function __unset(string $property): void 
    {
        $method = "set{$property}";
        if (method_exists($this, $method)) {
            $this->$method(null);
        }
    }

    /* listing 04.85, page 128 */
    /* Working with Interceptors (aka overloading, magic methods) */
    public function setName(?string $name): void 
    {
        $this->myname = $name;
        if (! is_null($name)) {
            $this->myname = strtoupper($this->myname);
        }
    }

    public function setAge(?int $age): void 
    {
        $this->myage = $age;
    }

    public function getName(): string 
    {
        return $this->myname;
    }
}