<?php declare(strict_types=1);

namespace popp\ch09\batch10;

class BloggsCommsManager extends CommsManager
{
    public function getHeaderText(): string
    {
        return "BloggsCal header\n";
    }

    public function make(int $flag): Encoder
    {
        switch ($flag) {
            case self::APPT:
                return new BloggsApptEncoder();
                break;
            case self::CONTACT:
                return new BloggsContactEncoder();
                break;
            case self::TTD:
                return new BloggsTtdEncoder();
                break;
        }
    }

    public function getFooterText(): string
    {
        return "BloggsCal footer\n";
    }
}