<?php

namespace popp\ch11\batch01;

class Runner {
    public static function run4()
    {
        $_REQUEST['form_input'] = "print file_get_contents('/etc/passwd');";

        /* listing 11.01 */
        $form_input = $_REQUEST['form_input'];
        // contains: "print file_get_contents('/etc/passwd');"
        eval($form_input);
    }
}
