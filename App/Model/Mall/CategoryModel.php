<?php


namespace App\Model\Mall;


use App\Model\MysqlModel;
use EasySwoole\DDL\Blueprint\Table;
use EasySwoole\DDL\DDLBuilder;
use EasySwoole\DDL\Enum\Character;
use EasySwoole\DDL\Enum\Engine;

class CategoryModel extends MysqlModel
{
    protected $tableName = 'mall_category';

    protected $autoTimeStamp ="datetime";
    protected $createTime = 'created_at';
    protected $updateTime = 'updated_at';



    public function getDDL() {
        $sql = DDLBuilder::table($this->tableName, function (Table $table)
        {

            $table->setTableComment('分类表')//设置表名称/
            ->setTableEngine(Engine::INNODB)//设置表引擎
            ->setTableCharset(Character::UTF8MB4_GENERAL_CI);//设置表字符集
            $table->colInt('cid', 10)->setColumnComment('分类ID')->setIsAutoIncrement()->setIsPrimaryKey();
            $table->colVarChar('app')->setIsNotNull(true)->setColumnLimit(64)->setColumnComment('属于那个APP');

            $table->colInt('sort_order')->setIsNotNull(false)->setDefaultValue(0)->setColumnComment('');

            $table->colInt('pid')->setIsNotNull(false)->setColumnComment('父类目I');
            $table->colVarChar('keywords')->setColumnLimit(4096)->setIsNotNull(false)->setColumnComment('keywords');

            $table->colVarChar('name')->setColumnLimit(128)->setIsNotNull(false)->setDefaultValue("")->setColumnComment('分类名称');
            $table->colVarChar('memo')->setColumnLimit(4096)->setIsNotNull(false)->setDefaultValue("")->setColumnComment('分类描述');
            $table->colVarChar('icon_url')->setColumnLimit(256)->setIsNotNull(false)->setDefaultValue("")->setColumnComment('分类小图标');
            $table->colVarChar('pic_url')->setColumnLimit(256)->setIsNotNull(false)->setDefaultValue("")->setColumnComment('分类大图标');

            $table->colTinyInt('status')->setIsNotNull(false)->setDefaultValue(0)->setColumnComment('分类状态（激活/非激活)');
            $table->colVarChar('creator')->setColumnLimit(128)->setIsNotNull(false)->setColumnComment('创建者');



            $table->colDateTime('created_at')->setColumnComment('创建时间');
            $table->colDateTime('updated_at')->setIsNotNull(false)->setColumnComment('更新时间');



        });
        return $sql;
    }

}