<?php


namespace App\HttpController\Business;


use App\Bean\Business\BizUserBean;
use App\HttpController\Base;
use App\Logic\BizService;
use App\Logic\SecurityService;

use App\Model\Platform\SmsModel;

class Passport extends Base
{
    /**
     * 商家后台登录
     */
    public function login() {
        $app = $this->getApp();
        $phone = $this->input("phone");
        $password = $this->input("password");
        $ip = $this->getIp();
        $ret = BizService::getInstance()->login($app,$phone,$password,$ip);
        $this->writeRet($ret);
    }

    public function logout() {

    }

    /**
     * 注册
     */
    public function register() {
        $app = $this->getApp();
        $sid = $this->input("sid");
        $code = $this->input("code");
        $phone = $this->input("phone");

        $ret = SecurityService::getInstance()->checkSidCode($app,$sid,$code,$phone);
        if($ret['code'] != 0) {
            return $this->writeRet($ret);
        }
         $bean  =new BizUserBean($this->getForm());
        $bean->register_ip = $this->getIp();

        $ret = BizService::getInstance()->newUser($bean);
        $this->writeRet($ret);

    }
}