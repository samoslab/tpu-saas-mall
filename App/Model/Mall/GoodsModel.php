<?php


namespace App\Model\Mall;


use App\Model\MysqlModel;
use EasySwoole\DDL\Blueprint\Table;
use EasySwoole\DDL\DDLBuilder;
use EasySwoole\DDL\Enum\Character;
use EasySwoole\DDL\Enum\Engine;

class GoodsModel extends MysqlModel
{
    protected $tableName = 'mall_goods';

    protected $autoTimeStamp ="datetime";
    protected $createTime = 'created_at';
    protected $updateTime = 'updated_at';

    public static $fields=[
        'app',//app
        'goods_sn' =>'商品编号',
        'name'=> '商品名称',
        'category_id' =>'商品所属类目ID',
        'brand_id' =>'0',
        'gallery'=> '商品宣传图片列表，采用JSON数组格式',
        'keywords' => '商品关键字，采用逗号间隔',
        'brief' => '商品简介',
        'is_on_sale'=>'是否上架',
        'sort_order' =>'100',
        'pic_url' =>'商品页面商品图片',
        'share_url'=>'商品分享朋友圈图片',
        'is_new'=> '是否新品首发，如果设置则可以在新品首发页面展示',
        'is_hot'=> '是否人气推荐，如果设置则可以在人气推荐页面展示',
        'unit' => '商品单位，例如件、盒',
        'counter_price' => '专柜价格',
        'retail_price'=>'零售价格',
        'detail'=>'商品详细介绍，是富文本格式',
        
    ];

    public function getDDL() {
        $sql = DDLBuilder::table($this->tableName, function (Table $table)
        {

            $table->setTableComment('商品')//设置表名称/
            ->setTableEngine(Engine::INNODB)//设置表引擎
            ->setTableCharset(Character::UTF8MB4_GENERAL_CI);//设置表字符集
            $table->colInt('id', 10)->setColumnComment('用户ID')->setIsAutoIncrement()->setIsPrimaryKey();
            $table->colVarChar('app')->setIsNotNull(true)->setColumnLimit(64)->setColumnComment('用户属于那个商家APP');
           //TODO：

            $table->colDateTime('created_at')->setIsNotNull(false)->setColumnComment('创建时间');
            $table->colDateTime('updated_at')->setIsNotNull(false)->setColumnComment('更新时间');



        });
        return $sql;
    }

}