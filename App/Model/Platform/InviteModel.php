<?php


namespace App\Model\Platform;


use App\Model\MysqlModel;
use EasySwoole\DDL\Blueprint\Table;
use EasySwoole\DDL\DDLBuilder;
use EasySwoole\DDL\Enum\Character;
use EasySwoole\DDL\Enum\Engine;

class InviteModel extends MysqlModel
{
    protected $tableName = 'platform_invite';
    protected $autoTimeStamp ="datetime";
    protected $createTime = 'created_at';
    protected $updateTime = 'updated_at';


    public function getDDL() {
        $sql = DDLBuilder::table($this->tableName, function (Table $table)
        {

            $table->setTableComment('用户邀请表')//设置表名称/
            ->setTableEngine(Engine::INNODB)//设置表引擎
            ->setTableCharset(Character::UTF8MB4_GENERAL_CI);//设置表字符集
            $table->colInt('id', 10)->setColumnComment('用户ID')->setIsAutoIncrement()->setIsPrimaryKey();
            $table->colVarChar('app')->setIsNotNull(true)->setColumnLimit(64)->setColumnComment('用户APP');
            $table->colVarChar('uid')->setIsNotNull(true)->setColumnLimit(64)->setColumnComment('用户ID');
            $table->colVarChar('invitees')->setIsNotNull(true)->setColumnLimit(64)->setColumnComment('被邀请人');
            $table->colVarChar('status')->setIsNotNull(true)->setColumnLimit(64)->setColumnComment('状态：0 未奖励'); //
            $table->colVarChar('type')->setIsNotNull(true)->setColumnLimit(64)->setColumnComment('类型'); //邀请类型
            $table->colVarChar('sign')->setIsNotNull(false)->setColumnLimit(64)->setColumnComment('签名'); //
            $table->colVarChar('remark')->setIsNotNull(false)->setColumnLimit(64)->setColumnComment('说明'); //

            $table->colVarChar('sourceType')->setIsNotNull(false)->setColumnLimit(64)->setColumnComment('来源，比如H5/app'); //


            $table->colVarChar('ip')->setIsNotNull(false)->setColumnLimit(64)->setColumnComment('IP'); //
            $table->colVarChar('did')->setIsNotNull(false)->setColumnLimit(128)->setColumnComment('设备ID'); //
            $table->colVarChar('sid')->setIsNotNull(false)->setColumnLimit(128)->setColumnComment('当前SESSION_ID'); //

            $table->colDateTime('created_at')->setIsNotNull(false)->setColumnComment('创建时间');
            $table->colDateTime('updated_at')->setIsNotNull(false)->setColumnComment('更新时间');

            $table->indexNormal('app_uid',['app','uid']);



        });
        return $sql;
    }


}