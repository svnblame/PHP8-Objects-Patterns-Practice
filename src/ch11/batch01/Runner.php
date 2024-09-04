<?php

namespace popp\ch11\batch01;

class Runner {
    public static function run(): void
    {
        /* listing 11.05 */
        $context = new InterpreterContext();
        $literal = new LiteralExpression('four');
        $literal->interpret($context);
        print $context->lookup($literal) . "\n";
    }

    public static function run4(): void
    {
        $_REQUEST['form_input'] = "print file_get_contents('/etc/passwd');";

        /* listing 11.01 */
        $form_input = $_REQUEST['form_input'];
        // contains: "print file_get_contents('/etc/passwd');"
        eval($form_input);
    }

    public static function run2(): void
    {
        /* listing 11.07 */
        $context = new InterpreterContext();
        $myVar = new VariableExpression('input', 'four');
        $myVar->interpret($context);
        print $context->lookup($myVar) . "\n";   // output: four

        $newVar = new VariableExpression('input');
        $newVar->interpret($context);
        print $context->lookup($newVar) . "\n";   // output: four

        $myVar->setValue('five');
        $myVar->interpret($context);
        print $context->lookup($myVar) . "\n";   // output: five
        print $context->lookup($myVar) . "\n";   // output: five
    }
}
