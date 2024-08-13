<?php declare(strict_types=1);

namespace popp\ch09\batch03;

class Runner
{
    public static function run(): void
    {
        /* listing 09.10 */
        $boss = new NastyBoss();
        $boss->addEmployee(Employee::recruit('harry'));
        $boss->addEmployee(Employee::recruit('bob'));
        $boss->addEmployee(Employee::recruit('mary'));

        $boss->projectFails();
        $boss->projectFails();
        $boss->projectFails();
    }
}
