<?php


namespace App\Model\Business;


use App\Model\MysqlModel;
use EasySwoole\DDL\Blueprint\Table;
use EasySwoole\DDL\DDLBuilder;
use EasySwoole\DDL\Enum\Character;
use EasySwoole\DDL\Enum\Engine;

class BizUserModel extends MysqlModel
{
    protected $tableName = 'business_user';

    protected $autoTimeStamp ="datetime";
    protected $createTime = 'created_at';
    protected $updateTime = 'updated_at';


    public function getDDL() {
        $sql = DDLBuilder::table($this->tableName, function (Table $table)
        {

            $table->setTableComment('B端用户表')//设置表名称/
            ->setTableEngine(Engine::INNODB)//设置表引擎
            ->setTableCharset(Character::UTF8MB4_GENERAL_CI);//设置表字符集
            $table->colInt('uid', 10)->setColumnComment('用户ID')->setIsAutoIncrement()->setIsPrimaryKey();
            $table->colVarChar('app')->setIsNotNull(true)->setColumnLimit(64)->setColumnComment('用户属于那个B');
            $table->colVarChar('password')->setIsNotNull(true)->setColumnLimit(64)->setColumnComment('登录密码');
            $table->colVarChar('tradepwd')->setIsNotNull(true)->setColumnLimit(64)->setColumnComment('交易密码');
            $table->colVarChar('username')->setIsNotNull(true)->setColumnLimit(64)->setColumnComment('用户名'); //邀请类型
            $table->colVarChar('nation')->setIsNotNull(true)->setColumnLimit(64)->setColumnComment('nation code'); //邀请类型
            $table->colVarChar('phone')->setIsNotNull(true)->setColumnLimit(64)->setColumnComment('phone'); //邀请类型
            $table->colVarChar('email')->setIsNotNull(true)->setColumnLimit(64)->setColumnComment('email'); //邀请类型

            $table->colVarChar('invite_code')->setIsNotNull(true)->setColumnLimit(64)->setColumnComment('邀请码');

            $table->colTinyInt('status')->setIsNotNull(true)->setColumnLimit(64)->setColumnComment('状态:已经激活');
            $table->colVarChar('remark')->setIsNotNull(false)->setColumnLimit(64)->setColumnComment('说明'); //
            $table->colVarChar('register_ip')->setIsNotNull(false)->setColumnLimit(64)->setColumnComment('IP'); //
            $table->colVarChar('login_ip')->setIsNotNull(false)->setColumnLimit(64)->setColumnComment('login IP'); //
            $table->colVarChar('sign')->setIsNotNull(false)->setColumnLimit(64)->setColumnComment('签名'); //

            $table->colDateTime('created_at')->setIsNotNull(false)->setColumnComment('创建时间');
            $table->colDateTime('updated_at')->setIsNotNull(false)->setColumnComment('更新时间');

            $table->indexUnique('app_uid',['app','uid']);


        });
        return $sql;
    }

}