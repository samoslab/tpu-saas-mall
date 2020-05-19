<?php


namespace App\Pool;


use App\Mongo\MongoConfig;
use EasySwoole\Component\Singleton;
use EasySwoole\Pool\Config as PoolConfig;
use EasySwoole\Redis\Config\RedisConfig;
use EasySwoole\RedisPool\RedisPool;
use EasySwoole\RedisPool\RedisPoolException;

class MongoDB
{


    use Singleton;
    protected $container = [];

    function register(string $name, MongoConfig $config): PoolConfig
    {
        if(isset($this->container[$name])){
            //已经注册，则抛出异常
            throw new \lException("mongo pool:{$name} is already been register");
        }
        $pool = new MongoPool($config);
        $this->container[$name] = $pool;
        return $pool->getConfig();
    }

    function get(string $name): ?MongoPool
    {
        if (isset($this->container[$name])) {
            return $this->container[$name];
        }
        return null;
    }

    function pool(string $name): ?MongoPool
    {
        return $this->get($name);
    }

    static function defer(string $name,$timeout = null):?\App\Mongo\MongoObject
    {
        $pool = static::getInstance()->pool($name);
        if($pool){
            return $pool->defer($timeout);
        }else{
            return null;
        }
    }

    static function invoke(string $name,callable $call,float $timeout = null)
    {
        $pool = static::getInstance()->pool($name);
        if($pool){
            return $pool->invoke($call,$timeout);
        }else{
            return null;
        }
    }

}
