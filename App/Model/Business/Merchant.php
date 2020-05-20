<?php


namespace App\Model\Business;


use App\Model\MysqlModel;
use EasySwoole\DDL\Blueprint\Table;
use EasySwoole\DDL\DDLBuilder;


class Merchant extends MysqlModel
{
    protected $tableName = 'business_merchant';

    protected $autoTimeStamp ="datetime";
    protected $createTime = 'created_at';
    protected $updateTime = 'updated_at';


    public function getDDL() {
        $sql = DDLBuilder::table($this->tableName, function (Table $table) {

            $table->setTableComment('商家');//设置表名称/
            $table->colVarChar('mid')->setIsNotNull(true)->setColumnLimit(64)->setColumnComment('商家ID');

            $table->colVarChar('app')->setIsNotNull(true)->setColumnLimit(64)->setColumnComment('商家APP');


            //TODO

            $table->colDateTime('created_at')->setIsNotNull(false)->setColumnComment('创建时间');
            $table->colDateTime('updated_at')->setIsNotNull(false)->setColumnComment('更新时间');
            $table->indexUnique('app_uid', ['app', 'uid']);
        });

    return $sql;
    }


}