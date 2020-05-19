<?php


namespace App\Utility;


class CacheTools
{

    public static function getRedis()
    {
        $redisPool = \EasySwoole\RedisPool\Redis::getInstance()->get('redis');
        $redis = $redisPool->defer();
        return $redis;
    }

}
