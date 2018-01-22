<?php

namespace Wangjian\Push\Sdk\Getui\IGetui\Utils;

class LogUtils
{
    static $debug = true;

    public static function debug($log)
    {
        if (self::$debug) {
            echo date('y-m-d h:i:s', time()) . ($log) . "\r\n";
        }
    }
}