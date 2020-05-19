<?php

namespace App\Mongo;

use EasySwoole\Component\Singleton;
use EasySwoole\Pool\Config as PoolConfig;
use EasySwoole\Pool\ObjectInterface;
use EasySwoole\Redis\Config\RedisConfig;
use Swoole\Coroutine;
use EasySwoole\SyncInvoker\AbstractInvoker;

class MongoObject  extends AbstractInvoker implements ObjectInterface
{

    protected $config;
    protected $db;
    protected $client;

    public function __construct(MongoConfig $config=null)
    {
       if($config == null) {

           $conf = config('MongoDB');
           $config = new MongoConfig($conf);
       }
        $this->config = $config->toArray();


        $driverOptions=[
            'typeMap' => [
                'array' => 'array',
                'document' => 'array',
                'root' => 'array',
            ]
        ];
        $username = $this->config['username'] ?? '';
        $password = $this->config['password'] ?? '';
        $authMechanism = $this->config['authMechanism'] ?? '';
        $replicaSet = $this->config['rs'] ?? '';
        if (empty($uriOptions['username'])) {
            $uriOptions['username'] = $username;
        }
        if (empty($uriOptions['password'])) {
            $uriOptions['password'] = $password;
        }
        if (empty($uriOptions['replicaSet']) && !empty($replicaSet)) {
            $uriOptions['replicaSet'] = $replicaSet;
        }
        if (empty($uriOptions['authMechanism']) && !empty($authMechanism)) {
            $uriOptions['authMechanism'] = $authMechanism;
        }

//        var_dump($uriOptions);
//        echo $config->getHost();
        $this->client = new \MongoDB\Client(
            $config->getHost(),
            [],
            $driverOptions
        );

//        var_dump($config);
        $this->db = $this->client->{$config->getDb()};
      //  return $this;


    }

    //unset 的时候执行
    public function gc() {
//        track_info(__METHOD__);

    }
    //使用后,free的时候会执行
    function objectRestore()
    {
//        $cid = Coroutine::getCid();
//        track_info(__METHOD__."|{$cid}");

    }
    //使用前调用,当返回true，表示该对象可用。返回false，该对象失效，需要回收
    function beforeUse():?bool {
//        track_info(__METHOD__);
        return true;
    }

    public function getDB()
    {
        return $this->db;
    }

    public function getClient() {
        return $this->client;
    }

    public function getCol($table)
    {
        return $this->db->{$table};
    }




}
