<?php


namespace App\Mongo;


use EasySwoole\EasySwoole\Trigger;
use EasySwoole\SyncInvoker\AbstractInvoker;
use MongoDB\Client;
use MongoDB\Database;


class MongoDriver extends AbstractInvoker
{
    private $db;

    private $config;

    private $client;

    private $dbName;

    public function getClient():Client {
        if($this->client) {
            return $this->client;
        }
        if($this->config == null) {

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
        if(empty($uriOptions['password'])) {
            $this->client = new \MongoDB\Client(
                $config->getHost(),
                [],
                $driverOptions
            );
        } else {
            $this->client = new \MongoDB\Client(
                $config->getHost(),
                $uriOptions,
                $driverOptions
            );
        }
//        echo $config->getHost();

        $this->dbName = $config->getDb();
        return $this->client;
    }
    public function getDb():Database
    {

        $db =  $this->getClient()->{$this->dbName};
//        var_dump($db);
        return $db;


    }



    protected function onException(\Throwable $throwable)
    {
        Trigger::getInstance()->throwable($throwable);
        return null;
    }
}

