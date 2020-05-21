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
            $table->colVarChar('mname')->setIsNotNull(true)->setColumnLimit(64)->setColumnComment('商家名称');
            $table->colVarChar('mlogo')->setIsNotNull(true)->setColumnLimit(255)->setColumnComment('商家Logo图片地址');
            $table->colVarChar('mlicense')->setIsNotNull(true)->setColumnLimit(255)->setColumnComment('商家营业执照图片地址');
            $table->colTinyInt('state')->setIsNotNull(true)->setColumnLimit(1)->setDefaultValue('0')->setColumnComment("商家状态 0待审核 1审核不通过 2审核通过 .....");
            $table->colVarChar('feedback')->setIsNotNull(true)->setColumnLimit(255)->setColumnComment("审核不通过反馈信息");
            $table->colVarChar('businesstype')->setIsNotNull(true)->setColumnLimit(64)->setColumnComment("商家经营类型");//不知道是否需要先写上
            //TODO

            $table->colDateTime('created_at')->setIsNotNull(false)->setColumnComment('创建时间');
            $table->colDateTime('updated_at')->setIsNotNull(false)->setColumnComment('更新时间');
            $table->indexUnique('app_uid', ['app', 'uid']);
        });

    return $sql;
    }


}