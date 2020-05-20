<?php


namespace App\HttpController\Common;


use App\HttpController\Base;
use App\Logic\SecurityService;

class Security extends Base
{

    /**
     * 发送手机短信
     */
    public function phonecode(){

        $nation = $this->get("nation");
        $phone = $this->get("phone");
        $ret = SecurityService::getInstance()->phonecode($nation,$phone);
        $this->writeRet($ret);

    }

}