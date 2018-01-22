<?php
namespace Wangjian\Push;

use Exception;
use Wangjian\Push\Sdk\Youmeng\Client;

class Factory
{
    protected static $creators = [];

    public static function createAdapter($configs)
    {
        $adapter = null;

        $driver = $configs['driver'];
        $createMethod = 'create' . ucfirst($driver) . 'Adapter';

        if(method_exists(__CLASS__, $createMethod)) {
            $adapter = call_user_func([__CLASS__, $createMethod], $configs);
        } else if(key_exists($createMethod, self::$creators)) {
            $adapter = call_user_func(self::$creators[$createMethod], $configs);
        } else {
            throw new Exception('unsupported driver');
        }

        return $adapter;
    }

    public static function extend($driver, callable $creator)
    {
        $createMethod = 'create' . ucfirst($driver) . 'Adapter';
        self::$creators[$createMethod] = $creator;
    }

    protected static function createYoumengAdapter($configs)
    {
        $client = new Client($configs['appKey'], $configs['appMasterSecret'], $configs['production']);

        return new YoumengAdapter($client);
    }

    protected static function createGetuiAdapter($configs)
    {

    }
}