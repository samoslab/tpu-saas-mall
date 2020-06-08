<?php


namespace App\Model\Mall;


use App\Model\MysqlModel;
use EasySwoole\DDL\Blueprint\Table;
use EasySwoole\DDL\DDLBuilder;
use EasySwoole\DDL\Enum\Character;
use EasySwoole\DDL\Enum\Engine;

class OrderModel extends MysqlModel
{
    protected $tableName = 'mall_order';

    protected $autoTimeStamp ="datetime";
    protected $createTime = 'created_at';
    protected $updateTime = 'updated_at';

    //参考
    public static $fields = [
        'app' => 'app',//app
        'user_id' => '用户表的用户ID',
        'order_sn' => '订单编号',
        'order_status' => '订单状态',
        'consignee' => '收货人名称',
        'mobile' => '收货人手机号',
        'address' => '收货具体地址',
        'message' => '用户订单留言',
        'goods_price' => '商品总费用',
        'freight_price' => '配送费用',
        'coupon_price' => '优惠券减免',
        'integral_price' => '用户积分减免',
        'groupon_price' => '团购优惠价减免',
        'order_price' => '订单费用， = goods_price + freight_price - coupon_price',
        'actual_price' => '实付费用， = order_price - integral_price',
        'pay_id' => '微信付款编号',
        'pay_time' => '微信付款时间',

        'ship_sn' => '发货编号',
        'ship_channel' => '发货快递公司',
        'ship_time' => '发货开始时间',
        'refund_amount' => '实际退款金额，（有可能退款金额小于实际支付金额）',
        'refund_type' => '退款方式',
        'refund_content' => '退款备注',
        'refund_time' => '退款时间',
        'confirm_time' => '用户确认收货时间',
        'comments' => '待评价订单商品数量',
        'end_time' => '订单关闭时间',
        'create_at' => '1',
        'update_at' => '2',
    ];


    public function getDDL() {
        $sql = DDLBuilder::table($this->tableName, function (Table $table)
        {

            $table->setTableComment('订单表')//设置表名称/
            ->setTableEngine(Engine::INNODB)//设置表引擎
            ->setTableCharset(Character::UTF8MB4_GENERAL_CI);//设置表字符集
            $table->colInt('id', 10)->setColumnComment('用户ID')->setIsAutoIncrement()->setIsPrimaryKey();
            $table->colVarChar('app')->setIsNotNull(true)->setColumnLimit(64)->setColumnComment('用户属于那个商家APP');
           //TODO：
            $table->colVarChar('uid')->setIsNotNull(true)->setColumnLimit(64)->setColumnComment('用户属于那个商家APP');

            $table->colVarChar('order_sn')->setIsNotNull(true)->setColumnLimit(64)->setColumnComment('用户属于那个商家APP');

            $table->colVarChar('phone')->setIsNotNull(true)->setColumnLimit(64)->setColumnComment('用户属于那个商家APP');

            $table->colDateTime('created_at')->setIsNotNull(false)->setColumnComment('创建时间');
            $table->colDateTime('updated_at')->setIsNotNull(false)->setColumnComment('更新时间');



        });
        return $sql;
    }

}