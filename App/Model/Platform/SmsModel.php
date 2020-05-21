<?php
/**
 * Created by PhpStorm.
 * Index: hanyouhong
 * Date: 2019-02-08
 * Time: 22:06
 */

namespace App\Model\Platform;


use App\Model\MysqlModel;
use App\Task\TaskSms;
use App\Utility\CacheTools;
use App\Utility\ErrorCode;
use EasySwoole\Component\Singleton;
use EasySwoole\DDL\Blueprint\Table;
use EasySwoole\DDL\DDLBuilder;
use EasySwoole\DDL\Enum\Character;
use EasySwoole\DDL\Enum\Engine;
use \EasySwoole\EasySwoole\Swoole\Task\TaskManager;
use \EasySwoole\EasySwoole\Config;
use EasySwoole\Utility\Random;
use EasySwoole\Utility\SnowFlake;
use Qcloud\Sms\SmsSingleSender;
use EasySwoole\EasySwoole\Logger;
use App\Utility\Pool\RedisPool;
use App\Model\MongoModel;

class SmsModel extends MysqlModel
{

    protected $tableName = 'platform_sms';

    protected $autoTimeStamp ="datetime";
    protected $createTime = 'created_at';
    protected $updateTime = 'updated_at';


    public function getDDL() {
        $sql = DDLBuilder::table($this->tableName, function (Table $table)
        {


            $table->setTableComment('短消息')//设置表名称/
            ->setTableEngine(Engine::INNODB)//设置表引擎
            ->setTableCharset(Character::UTF8MB4_GENERAL_CI);//设置表字符集
            $table->colInt('id', 10)->setColumnComment('用户ID')->setIsAutoIncrement()->setIsPrimaryKey();
            $table->colVarChar('app')->setIsNotNull(true)->setColumnLimit(64)->setColumnComment('APP');
            $table->colVarChar('nation')->setIsNotNull(true)->setColumnLimit(64)->setColumnComment('手机国家号码');
            $table->colVarChar('sid')->setIsNotNull(true)->setColumnLimit(64)->setColumnComment('sid');
            $table->colVarChar('op')->setIsNotNull(true)->setColumnLimit(64)->setColumnComment('op操作'); //邀请类型

            $table->colVarChar('phone')->setIsNotNull(true)->setColumnLimit(64)->setColumnComment('phone'); //deposit,withdraw,fee
            $table->colVarChar('code')->setIsNotNull(false)->setColumnLimit(64)->setColumnComment('code'); //
            $table->colVarChar('expire')->setIsNotNull(false)->setColumnLimit(64)->setColumnComment('expire'); //
            $table->colVarChar('msg')->setIsNotNull(false)->setColumnLimit(256)->setColumnComment('msg'); //
            $table->colVarChar('ip')->setIsNotNull(false)->setColumnLimit(64)->setColumnComment('ip'); //

            $table->colDateTime('created_at')->setIsNotNull(false)->setColumnComment('创建时间');
            $table->colDateTime('updated_at')->setIsNotNull(false)->setColumnComment('更新时间');



        });
        return $sql;
    }




}
