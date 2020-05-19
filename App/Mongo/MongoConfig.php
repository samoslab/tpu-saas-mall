<?php


namespace App\Mongo;
use EasySwoole\Pool\Config;
use EasySwoole\Pool\AbstractPool;
use EasySwoole\Redis\Config\RedisConfig;
use EasySwoole\Redis\Redis;
use EasySwoole\Spl\SplBean;


class MongoConfig extends SplBean
{
    public $host='127.0.0.1';
    public $port = 27017;
    public $timeout = 3.0;
    public $reconnectTimes = 3;
    public $db=null;
    public $username="";
    public $password="";
    public $client=null;
    public $rs=null;
    public $authSource=null;
    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @param string $host
     */
    public function setHost(string $host): void
    {
        $this->host = $host;
    }

    /**
     * @return int
     */
    public function getPort(): int
    {
        return $this->port;
    }

    /**
     * @param int $port
     */
    public function setPort(int $port): void
    {
        $this->port = $port;
    }

    /**
     * @return float
     */
    public function getTimeout(): float
    {
        return $this->timeout;
    }

    /**
     * @param float $timeout
     */
    public function setTimeout(float $timeout): void
    {
        $this->timeout = $timeout;
    }

    /**
     * @return int
     */
    public function getReconnectTimes(): int
    {
        return $this->reconnectTimes;
    }

    /**
     * @param int $reconnectTimes
     */
    public function setReconnectTimes(int $reconnectTimes): void
    {
        $this->reconnectTimes = $reconnectTimes;
    }

    /**
     * @return null
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * @param null $db
     */
    public function setDb($db): void
    {
        $this->db = $db;
    }

    /**
     * @return null
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param null $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return null
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param null $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return null
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param null $client
     */
    public function setClient($client): void
    {
        $this->client = $client;
    }

    /**
     * @return null
     */
    public function getRs()
    {
        return $this->rs;
    }

    /**
     * @param null $rs
     */
    public function setRs($rs): void
    {
        $this->rs = $rs;
    }

    /**
     * @return null
     */
    public function getAuthSource()
    {
        return $this->authSource;
    }

    /**
     * @param null $authSource
     */
    public function setAuthSource($authSource): void
    {
        $this->authSource = $authSource;
    }




}
