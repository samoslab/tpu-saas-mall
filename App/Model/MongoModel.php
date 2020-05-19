<?php
/**
 * Created by PhpStorm.
 * Index: root
 * Date: 18-11-1
 * Time: 下午1:49
 */

namespace App\Model;



use App\Mongo\MongoClient;
use App\Mongo\MongoConfig;
use App\Mongo\MongoDriver;
use App\Pool\MongoDB;
use App\Utility\CacheTools;
use App\Utility\Pool\MysqlPool;


use EasySwoole\Component\Pool\PoolManager;
use EasySwoole\EasySwoole\Task\TaskManager;
use EasySwoole\Redis\Redis;
use MongoDB\BSON\ObjectId;


class MongoModel
{


    private $config;
//    protected $table;
    protected  $client;
    protected  $db;
    protected  $sync=1;  //先不使用异步


    public function __construct($key='MongoDB') {
        $conf = config($key);
        $config = new MongoConfig($conf);
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
        $authSource = $this->config['authSource'] ?? '';
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
        if (empty($uriOptions['authSource']) && !empty($authSource)) {
            $uriOptions['authSource'] = $authSource;
        }

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


        $this->db = $this->client->{$config->getDb()};


    }


    /**
     * 返回标准格式数据
     * @param $code
     * @param string $msg
     * @param array $result
     * @return array
     */
    function setRet($code, $msg="", $result=[]) {
        return ['code'=>$code,'msg'=>$msg,'result'=>$result];
    }


    public function page($filter,$limit) {
        $data = $this->getCol(static::$table)->find($filter,['limit'=>$limit]);
        return ['code'=>0,'result'=>iterator_to_array($data),'msg'=>''];
    }

    public function pagelist($filter,$skip=0,$limit=20) {
        $data = $this->getCol(static::$table)->find($filter,[
            'limit'=>$limit,
            'skip'=>$skip
        ]);
        return ['code'=>0,'result'=>iterator_to_array($data),'msg'=>''];

    }



    /**
     * 获取一个事务ID
     * @return mixed
     */
    public function getTxSeqID() {
        $v = $this->getCol("sequences")->findOneAndUpdate(['appid'=>1,'type'=>'txid'],['$inc'=>['seq'=>1]],['upsert' => true]);
        return "txid-".($v->seq);
    }

    public function tbl() {
//        echo "current:".static::$table;
        return $this->getCol(static::$table);
//        $colName = static::$table;
  //      $table = $this->getTbl();
//        return $this->getSyncDB()->{$table};
    }




    public function getSession() {
        if($this->sync) {
            return $this->client->startSession();
        } else {


        return MongoClient::getInstance()->client()->callback(function (MongoDriver $driver) {
            return $driver->getClient()->startSession();
        });
        }
    }
    public function getTbl() {
        return static::$table;
    }


    public function getOne($filter,$options=[]) {
        return $this->findOne($filter,$options);
    }

    public function findOne($filter = [], array $options = []) {
        $table = $this->getTbl();
        if($this->sync) {
            return $this->getCol($table)->findOne($filter , $options);

        } else {
            return MongoClient::getInstance()->client()->callback(function (MongoDriver $driver) use($filter,$options,$table){
                return $driver->getDb()->{$table}->findOne($filter , $options);
            });
        }

    }

    public function insertOne($data) {
        $table = $this->getTbl();
        if($this->sync) {
            $ret = $this->getCol($table)->insertOne($data);
            if($ret != null) {
                return $ret->getInsertedId();
            } else {
                return null;
            }
        } else {


        return MongoClient::getInstance()->client()->callback(function (MongoDriver $driver) use($data,$table){
            $ret =  $driver->getDb()->{$table}->insertOne($data);
            if($ret != null) {
               return $ret->getInsertedId();

            } else {
                return null;
            }
        });
        }
    }
    //
    public function updateOne($filter,$data,$options=[]) {
        $table = $this->getTbl();
        if($this->sync) {

            $ret = $this->getCol($table)->updateOne($filter,$data,$options);
            if($ret != null) {
                return $ret->getModifiedCount();
            } else {
                return 0;
            }
        } else {


            return MongoClient::getInstance()->client()->callback(function (MongoDriver $driver) use($filter,$data,$options,$table){
                $ret =  $driver->getDb()->{$table}->updateOne($filter,$data,$options);

                if($ret != null) {
                    return $ret->getModifiedCount();
                } else {
                    return 0;
                }
            });
        }
    }

    /*
     * {"errno":0,"data":{"total":0,"pages":0,"limit":20,"page":0,"list":[]},"errmsg":"成功"}
     */
    public function search($filter,$options=[]) {
        $table = $this->getTbl();

        if($this->sync) {
            $count = $this->getCol($table)->countDocuments($filter);
            $cursor =  $this->getCol($table)->find($filter,$options);
            $list=[];
            foreach ($cursor as $o) {
                $o['oid'] = (string)$o["_id"];
                unset($o["_id"]);
                $list[]=$o;
            }
            return ['total'=>$count,'list'=> $list];

        } else {
            return MongoClient::getInstance()->client()->callback(function (MongoDriver $driver) use($filter,$options,$table){
                $count = $driver->getDb()->{$table}->countDocuments($filter);
                $cursor =  $driver->getDb()->{$table}->find($filter,$options);
                $list=[];
                foreach ($cursor as $o) {
                    $o['oid'] = (string)$o["_id"];
                    unset($o["_id"]);
                    $list[]=$o;
                }
                return ['total'=>$count,'list'=> $list];

            });
        }

    }

    public function gets($filter=[],$options=[]) {
        $table = $this->getTbl();
        if($this->sync) {
            $cursor =  $this->getCol($table)->find($filter,$options);
            return iterator_to_array($cursor);
        } else {
            return MongoClient::getInstance()->client()->callback(function (MongoDriver $driver) use($filter,$options,$table){
                $cursor =  $driver->getDb()->{$table}->find($filter,$options);
                return iterator_to_array($cursor);
            });
        }


    }




    /**
     * 检查Money是不是对哦图
     * @param $money
     * @return array
     */
    public function checkMoney($money) {
        if($money < 0.0 && $money > 1000000) {
            return ['code'=>1,"msg"=>'转出的钱不对'];
        } else {
            return ['code'=>0,"msg"=>'转出的钱不对'];
        }
    }




//    public function getSession()
//    {
//        MongoDB::defer('mongo')->getClient()->startSession();
//
//    }

    public function getDB() {
        return MongoDB::defer("mongo")->getDB();

    }

    public function toArrayAndUnsetId($curosr) {
        $list=[];
        foreach($curosr as $o) {
            unset($o['_id']);
            $list[]=$o;
        }
        return $list;
    }

    public function getString($v) {
        if(empty($v)) {
            return "";
        }
        return strval($v);
    }
    public function getInt($v) {
        if(empty($v)) {
            return 0;
        }
        return intval($v);
    }
    public function getFloat($v) {
        if(empty($v)) {
            return 0;
        }
        return floatval($v);
    }

    public function getCol($colName="") {
        if($colName == "") {
            $colName = static::$table;
        }
        return $this->db->{$colName};
//        echo __METHOD__."->{$colName}";
//        return MongoDB::defer('mongo')->getCol($colName);

    }



    public function unsetOid(&$list) {
        foreach($list as &$o) {
            unset($o['_id']);
        }
    }


    public function getLoginInfo($accessToken)
    {
        $redis = CacheTools::getRedis();
        $v = $redis->get($accessToken);
        return json_decode($v,true);
    }

    public function getAccessTokenInfo($accessToken){
        return $this->getLoginInfo();
    }





    public function appSeq($app,$type) {
        $v = $this->getCol("platform_seq")->findOneAndUpdate(['app'=>$app,'type'=>$type],['$inc'=>['seq'=>1]],['upsert' => true,
            'returnDocument'=>2]);
//        var_dump($v);
        if(empty($v)) {
            $v = $this->getCol("platform_seq")->findOne(['app'=>$app,'type'=>$type]);
        }
        return $v['seq'];

    }




    public function getFields(){
        if($this->fields) {
            return $this->fields;
        } else {
            return [];
        }
    }



    /**
     * 得到限制字段
     *
     * @param array $field
     * @param bool  $_id
     *
     * @return array
     */
    public function getFieldOption($field = [], $_id = false){
        $info = [];
        if($field){
            foreach ($field as $v){
                $info[$v] = 1;
            }
        }
        $info['_id'] = $_id ? 1 : 0;
        return [
            'projection' => $info
        ];
    }

    public function filterFields(&$data){
        $fields = static::$fields;
//        var_dump($fields);
//        var_dump($data);
        foreach($data as $k=>$v) {
            if(!isset($fields[$k])) {
                unset($data[$k]);
            }
        }
    }




    public function trackEvt(EvtBean $evtBean) {
        TaskManager::getInstance()->async(function () use ($evtBean){
            EventModel::getInstance()->record($evtBean);
        });

    }

    public function __destruct()
    {
    }

}


