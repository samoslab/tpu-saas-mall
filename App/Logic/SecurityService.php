<?php


namespace App\Logic;


use App\Utility\StringUtil;
use EasySwoole\Component\Singleton;
use Nette\Utils\Random;

class SecurityService extends BaseService
{

    use Singleton;

    public function phonecode($nation,$phone) {
        $num = "";

        //TODO:Send
        $sid = StringUtil::getUUid();
        return $this->setRet(0,'ok',['sid'=>$sid]);
    }

}