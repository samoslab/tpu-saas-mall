<?php


namespace App\Logic;


use App\Bean\EvtBean;
use App\Model\System\EventModel;
use EasySwoole\Component\Singleton;
use EasySwoole\EasySwoole\Task\TaskManager;

class BaseService
{


    public function setRet($code,$msg="",$result=[]) {
        return ['code'=>$code,'msg'=>$msg,'result'=>$result];
    }

    protected function trackEvt(EvtBean $evtBean) {
        TaskManager::getInstance()->async(function () use ($evtBean){
            EventModel::getInstance()->record($evtBean);
        });

    }

    protected function getRet($flag,$data='') {
        if($flag) {
            $ret = $this->setRet(0,'ok',$data);
        } else {
            $ret = $this->setRet(1,'fail',$data);
        }
        return $ret;
    }
}
