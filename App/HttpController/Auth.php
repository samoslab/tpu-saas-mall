<?php


namespace App\HttpController\Customer;

use App\HttpController\Base;

class Auth  extends Base
{



    protected function onRequest(?string $action): ?bool
    {
        $ret = parent::onRequest($action);
        if($ret === false){
            return false;
        }
//        return true;
        $uid = $this->getUid();
        if($uid == 0 ) {
            $this->writeJson(1000,[],"请退出应用后重新登录");
            return false;
        }
        $info = $this->getLoginInfo();
        $app = $this->getApp();
        if(get_kv($info,'app') != $app) {
            return false;
        }

        return true;

    }


}