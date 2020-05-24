<?php


namespace App\Logic;


/**
 * Class BurstService
 * @package App\Logic
 * 奖励
 */
class PromoteService extends BaseService
{

    public function getUidByRefcode($app,$refcode) {
        return $refcode;
    }

    public function getRefcodeByUid($app,$uid) {

    }

}