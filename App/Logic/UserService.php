<?php


namespace App\Logic;


use App\Bean\User\UserPhoneRegisterBean;
use App\Model\V2\User\UserModel;
use EasySwoole\Component\Singleton;

class UserService extends BaseService
{
    use Singleton;


    public function getPassword($password)
    {
        return sha1($password."tpuisgreat");
    }
    public function newUserByPhone(UserPhoneRegisterBean $bean)
    {
        $bean->addProperty("password",$this->getPassword($bean->getProperty("password")));
//        var_dump($bean->toArray());
        $id = UserModel::create($bean->toArray())->save();
        if($id) {
            return $this->setRet(0,'ok',$id);
        } else {
            return $this->setRet(1,"fail");
        }
    }

}