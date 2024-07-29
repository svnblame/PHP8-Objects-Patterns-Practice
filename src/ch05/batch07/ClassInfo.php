<?php declare(strict_types=1);

namespace popp\ch05\batch07;

class ClassInfo
{
    /* listing 05.64 */
    public static function getData(\ReflectionClass $class) : string
    {
        $details = '';
        $name = $class->getName();

        $details .= ($class->isUserDefined())   ? "$name is user defined\n"      : '';
        $details .= ($class->isInternal())      ? "$name is built-in\n"          : '';
        $details .= ($class->isInterface())     ? "$name is interface\n"         : '';
        $details .= ($class->isAbstract())      ? "$name is an abstract class\n" : '';
        $details .= ($class->isFinal())         ? "$name is a final class\n"     : '';
        $details .= ($class->isInstantiable())  ? "$name can be instantiated\n"  : '';
        $details .= ($class->isCloneable())     ? "$name can be cloned\n"        : '';

        return $details;
    }

    public static function methodData(\ReflectionMethod $method) : string
    {
        $details = '';
        $name = $method->getName();

        $details .= ($method->isUserDefined())    ? "$name is user defined\n"      : '';
        $details .= ($method->isInternal())       ? "$name is built-in\n"          : '';
        $details .= ($method->isAbstract())       ? "$name is an abstract class\n"          : '';
        $details .= ($method->isPublic())         ? "$name is public\n"         : '';
        $details .= ($method->isProtected())      ? "$name is protected\n"          : '';
        $details .= ($method->isPrivate())        ? "$name is private\n"          : '';
        $details .= ($method->isStatic())         ? "$name is static\n"          : '';
        $details .= ($method->isFinal())          ? "$name is final\n"          : '';
        $details .= ($method->isConstructor())    ? "$name is the constructor\n"          : '';
        $details .= ($method->returnsReference()) ? "$name returns a reference (as opposed to a value)\n"          : '';

        return $details;
    }
}