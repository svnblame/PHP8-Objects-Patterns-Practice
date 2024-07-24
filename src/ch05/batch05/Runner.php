<?php declare(strict_types=1);

namespace popp\ch05\batch05;

class Runner
{
    public static function runBefore()
    {
        /* listing 05.37 */
        $classname = 'Task';
        require_once("tasks/{$classname}.php");
        $classname = "tasks\\{$classname}";
        $myObj = new $classname();
        $myObj->doSpeak();
        /* listing 05.37 */
    }
}