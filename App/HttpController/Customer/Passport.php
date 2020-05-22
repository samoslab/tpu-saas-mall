<?php


namespace App\HttpController\Customer;


use App\Bean\User\UserPhoneRegisterBean;
use App\HttpController\Base;
use App\Logic\UserService;

class Passport extends Base
{

    public function registerWithPhone() {
        $form = $this->getForm();
        $bean = new UserPhoneRegisterBean($form);
        $bean->ip = $this->getIp();
        $ret = UserService::getInstance()->newUserByPhone($bean);
        $this->writeRet($ret);
    }



}