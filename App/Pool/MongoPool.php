<?php
/**
 * Created by PhpStorm.
 * User: Tioncico
 * Date: 2019/10/15 0015
 * Time: 14:46
 */

namespace App\Pool;

use EasySwoole\Pool\Exception\PoolEmpty;
use EasySwoole\Pool\MagicPool;
use EasySwoole\Pool\Config;
use EasySwoole\Pool\AbstractPool;


use App\Mongo\MongoObject;
use App\Mongo\MongoConfig;
use EasySwoole\Redis\Config\RedisClusterConfig;
use EasySwoole\Redis\Config\RedisConfig;
use EasySwoole\Redis\Redis;
use EasySwoole\Redis\RedisCluster;


class MongoPool extends MagicPool
{



    function __construct(MongoConfig $mconfig)
    {
        parent::__construct(function ()use($mconfig){
            if ($mconfig instanceof MongoConfig){

                $o = new MongoObject($mconfig);
            }
            return $o;
        });
    }






    public function getObj(float $timeout = null, int $tryTimes = 3):?MongoObject {
        return parent::getObj($timeout,$tryTimes);
    }


}
