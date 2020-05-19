<?php
/**
 * Created by PhpStorm.
 * Index: hanyouhong
 * Date: 2019-02-09
 * Time: 07:06
 */

namespace App\Utility;



class ErrorCode
{
    const success = 0;

    const error = -1;

    const DB_ERROR = '数据库错误';

    const write_json_error = [
        'code' => 500,
        'msg' => 'response 组成 json 字符串失败'
    ];

    const missing_args=102;
    const missing_config=101; //缺失配置
    const sms_code_check_failed=103;//
    const db_error = 104;
    const access_token_error = 105;
    const db_update_error = 106;

    const session_expired=500;

    const user_login_failed = 107;
    const user_login_sign_faild=108;

    const user_is_frozed = 109;

    const get_signal_address_failed = 110;
    const get_group_address_failed = 111;
    const login_token_expired = 112;

    const data_error = 114;

    const expire = 126;

    const goods_data_non_conformity = 115;//商品数据不合规则

    const not_sufficient_funds = 116;    //余额不足

    const paypasswd_wrong = 117;
    const deduct_money_failed = 118;
    const build_good_failed = 119;

    const set_paystate_failed = 120;
    const set_handlestate_failed = 121;

    const db_null = 121;    //数据为空
    const service_returned_error = 122;

    const access_token_inject_error = 1000;


    /**
     * 添加余额失败
     */
    const add_balance_failed = 123;
    /**
     * 地址为空
     */
    const address_is_null = 140;

    /**
     * 绑定失败
     */
    const address_bind_failed = 124;
    /**
     * 支付密码错误
     */

    const paypawd_error = 217;

    /**
     * body 参数错误
     */
    const body_parameter_error = [
        'code' => 125,
        'msg' => 'body某个参数错误'
    ];


    const freezing_error = 126;

    const myself = 127;

    const key_set_error = 128;

    const hash_error = 129;

    const ip_error = 130;

    const no_pay_type = 132;

    const no_address = 133;

    const fill_in_address_error =134;
    const cmd_error = 135;
    const address_verify_failed = 136;

    const ordering = 137;

    const order_has_been_processed = 139;


    const Address_already_exists = 141;

    const The_query_fails = 142;

    const withdraw_fails = 143;

    const deposit_withdraw_address_same = 145;

    /*
     * Admin Error Part
     */
    const admin_login_failed = 201;

    const passwd_error = 202;

    /**
     * 格式错误
     */
    const format_error = 203;

    /**
     * 无权限
     */
    const no_permission = 204;

    /**
     * 注册时候电话已经存在
     */
    const phone_exist = 205;

    /**
     * 注册没有邀请码
     */
    const register_no_refcode = 206;

    /**
     * 注册使用错误的邀请码
     */
    const register_refcode_error = 207;

    /**
     * token验证没有时间戳
     */
    const timestamp_miss = 208;

    /**
     * token验证时间戳超时
     */
    const timestamp_time_out = 209;

    /**
     * token miss
     */
    const access_token_miss = 210;

    /**
     * good_id 不对
     */
    const goods_id_error = 211;

    /**
     * 商品超出限制
     */
    const goods_limit = 212;

    /**
     * 支付宝设置一次
     */
    const alipay_already_set = [
        'code' => 213,
        'msg' => 'alipay can only be set once '
    ];

    /**
     * 微信设置一次
     */
    const wechat_already_set = [
        'code' => 213,
        'msg' => 'wechat can only be set once '
    ];

    /**
     * 数据库操作错误
     */
    const db_option_error = [
        'msg' => 'db option error',
        'code' => 214,
    ];

    /**
     * 缺少参数
     */
    const missing_parameters = [
        'code' => 215,
        'msg' => 'missing parameters'
    ];

    /**
     * 参数格式不对
     */
    const parameter_format_wrong = [
        'code' => 216,
        'msg' => 'parameter format wrong'
    ];

    /**
     * 交易密码不正确
     */
    const paypasswd_error = [
        'code' => 217,
        'msg' => 'paypasswd is wrong'
    ];

    /**
     * 购物车是空的
     */
    const cart_is_empty = [
        'code' => 218,
        'msg' => 'cart is empty'
    ];

    /**
     * 购物车商品超出限制
     */
    const cart_count_limit = [
        'code' => 219,
        'msg' => 'cart count is beyond limit'
    ];

    /**
     * 账户金额不足
     */
    const user_coin_not_enough = [
        'code' => 219,
        'msg' => 'user coin not enough'
    ];

    /**
     * 身份证号已存在
     */
    const idcard_already_exist = [
        'code' => 220,
        'msg' => 'idcard already exist'
    ];

    /**
     * 银行卡号已存在
     */
    const bankacount_already_exist = [
        'code' => 220,
        'msg' => 'bankacount already exist'
    ];

    /**
     * 只能实名认证一次
     */
    const authenticate_already_set = [
        'code' => 221,
        'msg' => 'authenticate can only be set once '
    ];

    /**
     * 订单号不存在
     */
    const orderno_not_exist = [
        'code' => 222,
        'msg' => 'orderno not exist'
    ];

    /**
     * 姓名格式错误
     */
    const realname_format_wrong = [
        'code' => 223,
        'msg' => 'realname format wrong'
    ];

    /**
     * 银行卡格式错误
     */
    const bankacount_format_wrong = [
        'code' => 224,
        'msg' => 'bankacount format wrong'
    ];

    /**
     * 手机号格式错误
     */
    const phone_format_wrong = [
        'code' => 224,
        'msg' => 'phone format wrong'
    ];

    /**
     * 订单商品超出限制
     */
    const unpay_order_count_limit = [
        'code' => 225,
        'msg' => 'unpay order count is beyond limit'
    ];

    /**
     * 电话不是自己的电话
     */
    const phone_is_wrong = [
        'code' => 226,
        'msg' => 'phone is wrong'
    ];

    /**
     * 登录密码两次不一样
     */
    const passwd_is_inconsistent = [
        'code' => 227,
        'msg' => 'passwd is inconsistent'
    ];

    /**
     * 验证码不正确
     */
    const code_is_wrong = [
        'code' => 227,
        'msg' => 'code is wrong'
    ];

    /**
     * 请求字符串过长
     */
    const request_string_limit = [
        'code' => 228,
        'msg' => 'request string is so long'
    ];

    /**
     * 登录密码错误
     */
    const passwd_wrong = [
        'code' => 229,
        'msg' => 'passwd is wrong'
    ];

    /**
     * 支付密码前后不一致
     */
    const paypasswd_is_inconsistent = [
        'code' => 230,
        'msg' => 'paypasswd is inconsistent'
    ];

    /**
     * 没有找到该佩琦信息
     */
    const pig_not_found = [
        'code' => 231,
        'msg' => ' can not find the pig'
    ];
    /**
     * 图片不是base64
     */
    const image_not_base64 = [
        'code' => 232,
        'msg' => 'image is not base64'
    ];

    /**
     * 佩琦id不属于该用户
     */
    const pigid_not_users = [
        'code' => 233,
        'msg' => 'pigid is not alone user'
    ];

    /**
     * 今天签到过了
     */
    const has_signed_today = [
        'code' => 234,
        'msg' => 'the user has signed todey',
    ];

    /**
     * 更新猪或者人的信息失败
     */
    const update_info_fail = [
        'code' => 235,
        'msg' => 'update info fail',
    ];

    /**
     * 插入新的签到记录失败
     */
    const insert_signed_fail = [
        'code' => 236,
        'msg' => 'insert signed fail',
    ];

    /**
     * 红包过期了
     */
    const redpack_has_overtime = [
        'code' => 237,
        'msg' => '红包过期了',
    ];

    const redpack_has_finished = [
        'code' => 238,
        'msg' => '红包抢完了',
    ];

    /**
     * 用户加钱失败
     */
    const add_money_failed = [
        'code' => 239,
        'msg' => 'user add money in UserSetTokenModel failed',
    ];


    const send_friend_request_repeat = [
        'msg' => '请不要重复发送好友请求',
        'code' => 240,
    ];

    const not_group_member = [
        'msg' => '不是群成员',
        'code' => 241,
    ];

    const not_group_creator = [
        'msg' => '不是群主',
        'code' => 242,
    ];

    const not_friend = [
        'msg' => '不是好友',
        'code' => 243,
    ];

    const friend_offline = [
        'msg' => '好友不在线',
        'code' => 244,
    ];

    const user_not_in_topic = [
        'msg' => '用户不在topic中',
        'code' => 245,
    ];

    const user_not_friend_request_self = [
        'msg' => '用户不能添加自己为好友',
        'code' => 246,
    ];

    const already_friend = [
        'msg' => '已经是好友, 不能发好友请求',
        'code' => 247,
    ];

    const image_size_large = [
        'msg' => '图片尺寸过大',
        'code' => 248,
    ];

    const can_not_search_self = [
        'msg' => '添加好友时不能搜索自己',
        'code' => 249,
    ];

    const user_info_not_exists = [
        'msg' => '用户信息不存在',
        'code' => 250,
    ];

    const appid_uid_must_int = [
        'msg' => 'appid和uid必须是整型',
        'code' => 251,
    ];

    const user_not_exist = [
        'msg' => '用户不存在',
        'code' => 252,
    ];

    const already_in_group = [
        'msg' => '用户已经是群成员',
        'code' => 253,
    ];

    const p2p_self_redpack = [
        'msg' => '点对点聊天发送者不能抢自己红包',
        'code' => 254,
    ];

    const redpack_user_had_got = [
        'code' => 255,
        'msg' => '红包您已经抢过了',
    ];

    const redpack_invalid = [
        'code' => 256,
        'msg' => '红包无效',
    ];

    const redpack_passwd_wrong = [
        'code' => 257,
        'msg' => '红包口令错误',
    ];

    /**
     * 缺少参数
     */
    const num_must_numeric = [
        'code' => 258,
        'msg' => '数量必须是整数'
    ];

    /**
     * 提币地址未绑定
     */
    const address_not_exist = [
        'code' => 259,
        'msg' => '提币地址未绑定'
    ];

    /**
     * 不是管理员
     */
    const user_not_admin = [
        'code' => 260,
        'msg' => '不是管理员'
    ];

    /**
     * id不存在
     */
    const id_not_exist = [
        'code' => 261,
        'msg' => 'id不存在'
    ];

    /**
     * token扣钱失败
     */
    const reduce_token_fail = [
        'code' => 262,
        'msg' => '数据库扣钱失败'
    ];

    /**
     * token扣钱失败
     */
    const chain_reduce_token_fail = [
        'code' => 268,
        'msg' => '区块链扣钱失败'
    ];

    /**
     * token不足
     */
    const coin_not_enough = [
        'code' => 263,
        'msg' => 'token不足'
    ];

    /**
     * redis生成红包失败
     */
    const redpackid_get_wrong = [
        'code' => 264,
        'msg' => '获取红包ID错误'
    ];

    /**
     * redis生成红包失败
     */
    const db_data_error = [
        'code' => 265,
        'msg' => '数据库获取数据失败'
    ];

    /**
     * redis生成红包失败
     */
    const fields_error = [
        'code' => 266,
        'msg' => '字段错误'
    ];

    /**
     * 未设置交易密码
     */
    const paypasswd_is_null = [
        'code' => 267,
        'msg' => '未设置交易密码'
    ];

    const data_cannot_arrvage = [
        'code' => 268,
        'msg' => '数据不能整除'
    ];

    const withdraw_deposit_address_same = [
        'code' => 269,
        'msg' => '提币地址不能充币地址一样'
    ];

    /**
     * 还未设置交易密码
     */
    const paypasswd_not_set = [
        'code' => 270,
        'msg' => '还未设置交易密码'
    ];

    /**
     * 图片尺寸过大
     */
    const img_size_large = [
        'code' => 271,
        'msg' => '图片尺寸过大'
    ];

    /**
     * 数据库未找到该用户信息
     */
    const no_user_in_mongo = [
        'code' => 272,
        'msg' => '怎么数据库没有该用户数据呢'
    ];

    const effective_digit_illegel = [
        'code' => 273,
        'msg' => '您这个数据的小数有点太小了哦，正常是小数点后3位，以太坊是4位哦'
    ];

    const freeze_coin_failed = [
        'code' => 274,
        'msg' => '冻结Token失败'
    ];

    const create_sellotclist_failed = [
        'code' => 275,
        'msg' => '哎呀，创建出售挂单失败了'
    ];

    const create_sellorder_failed = [
        'code' => 2761,
        'msg' => '哎呀，创建出售订单失败了'
    ];

    const no_otcid_info_inmongo = [
        'code' => 276,
        'msg' => '亲,没有该挂单信息哦'
    ];

    const otcid_non_tradable = [
        'code' => 277,
        'msg' => '亲,这个订单不可以交易了哦'
    ];

    const set_otcid_tradable_failed = [
        'code' => 278,
        'msg' => '抢该挂单失败'
    ];

    const create_buyorder_failed = [
        'code' => 279,
        'msg' => '创建买单挂单失败'
    ];

    const no_sellorderinfo_inmongo = [
        'code' => 280,
        'msg' => '没有卖家订单信息'
    ];

    const no_buyorderinfo_inmongo = [
        'code' => 281,
        'msg' => '没有买家订单信息'
    ];

    const set_sellorder_state_failed = [
        'code' => 282,
        'msg' => '修改卖家订单状态失败'
    ];

    const set_buyorder_state_failed = [
        'code' => 283,
        'msg' => '修改买家订单状态失败'
    ];

    const unfrozen_token_failed = [
        'code' => 284,
        'msg' => '解冻token失败'
    ];

    const payment_method_error = [
        'code' => 285,
        'msg' => '支付状态错误'
    ];

    const has_pay_the_order = [
        'code' => 286,
        'msg' => '亲，就算您再土豪也只收一次钱哦'
    ];

    const someone_has_pay_order_cannot_cancenl = [
        'code' => 287,
        'msg' => '已经有人为此订单付款了哦，不可以取消啦'
    ];

    const order_has_finish = [
        'code' => 288,
        'msg' => '这个订单已经完成啦，不可以取消'
    ];

    const set_otclist_state_failed = [
        'code' => 289,
        'msg' => '设置挂单状态失败'
    ];

    const set_sellorder_cancel_failed = [
        'code' => 290,
        'msg' => '卖家取消挂单失败啦'
    ];

    const otclist_cannot_cancenl = [
        'code' => 291,
        'msg' => '这个订单已经是不可交易状态啦'
    ];

    const set_buyorder_paystate_failed = [
        'code' => 292,
        'msg' => '修改买家订单支付状态失败'
    ];

    const role_value_error = [
        'code' => 293,
        'msg' => '角色值错误 1000为卖家 2000为买家'
    ];

    const order_state_value_error = [
        'code' => 294,
        'msg' => '对应角色的订单状态值错误'
    ];

    const no_orderid_in_mongo = [
        'code' => 295,
        'msg' => '没有这个订单的信息'
    ];

    const withdraw_num_limit = [
        'code' => 296,
        'msg' => '提币数量不在允许范围内'
    ];

//    const payment_too_fast = [
//        'code' => 296,
//        'msg' => "同一个挂单支付太快啦,".OtcRedisModel::incr_prefix_expire_time." 秒后再试"
//    ];

    const redis_set_key_overtime_failed = [
        'code' => 297,
        'msg' => 'key设置过期时间失败'
    ];

    const redis_null_error = [
        'code' => 298,
        'msg' => '$self::redis is null'
    ];

    const no_redid_in_redis = [
        'code' => 299,
        'msg' => 'key设置过期时间失败'
    ];

    const redis_exception_error = [
        'code' => 300,
        'msg' => 'redis is exception'
    ];

    const get_redpack_amount_failed = [
        'code' => 301,
        'msg' => 'redis is exception'
    ];

    const sell_token_equal_want_token = [
        'code' => 302,
        'msg' => '出售货币和期望货币不可以相同'
    ];

    const can_not_buy_own_sell_otc = [
        'code' => 303,
        'msg' => '不可以购买自己的订单'
    ];

    const set_order_state_failed = [
        'code' => 304,
        'msg' => '设置订单状态失败'
    ];

    const body_data_illegal = [
        'code' => 305,
        'msg' => '数据不合法'
    ];

    /**
     * 提币地址未绑定
     */
    const selltoken_address_not_exist = [
        'code' => 259,
        'msg' => 'sell提币地址未绑定'
    ];

    /**
     * 提币地址未绑定
     */
    const wanttoken_address_not_exist = [
        'code' => 259,
        'msg' => 'want提币地址未绑定'
    ];

    const set_buyerorder_cancel_failed = [
        'code' => 306,
        'msg' => '买家取消挂单失败啦'
    ];

    const txid = [
      'code'=>2000,
      'msg'=>'事务ID失败'
    ];
    const withdraw = [
        'code'=>2001,
        'msg'=>'余额不足'
    ];
    const withdraw_feetoken = [
        'code'=>2001,
        'msg'=>'手续费币种余额不足'
    ];
    const redpkt_not_sufficient_funds = [
        'code'=>2002,
        'msg'=>'余额不足'
    ];

    const user_tradepwd_missing = [
        'code'=>2003,
        'msg'=>'未设置交易密码'
    ];
    const user_tradepwd_error = [
        'code'=>2004,
        'msg'=>'交易密码错误'
    ];
    const user_op_min_error = [
        'code'=>2005,
        'msg'=>'操作数量小于最小值'
    ];

    const input_args_error = [
        'code'=>3005,
        'msg'=>'参数值不正确'
    ];


    const redpkt_expire_error = [
        'code'=>4005,
        'msg'=>'红包过期'
    ];
}
