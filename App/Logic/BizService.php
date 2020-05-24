<?php


namespace App\Logic;


use App\Model\Business\BizUserModel;
use App\Model\Platform\InviteModel;
use EasySwoole\Component\Singleton;
use App\Bean\Business\BizUserBean;
/**
 * Class BizService
 * @package App\Logic
 *
 * 商家管理后台
 */
class BizService extends BaseService
{
    use Singleton;

    private function getPassword($password) {
        return sha1($password."mysaltlove");
    }

    public function getUserRole($uid) {
        return [
            'admin',
            'user'
        ];
    }
    public function login($phone,$password,$ip) {
        $where = [
            'phone'=>$phone,
            'password'=> $this->getPassword($password)
        ];
        $user = BizUserModel::create()->get($where)->field(['uid','username']);
        if($user) {

            $this->setRet(0,'',['user'=>$user,'role'=>$this->getUserRole($user['uid'])]);

        } else {
            $this->setRet(1,"login fail");
        }
    }

    public function newUser(BizUserBean $bean) {
        $user = $bean->toArray();
        $user['password'] = $this->getPassword($bean->password);
        $user['status']=0; //未审核，注册未审核
        $uid = BizUserModel::create($user)->save();
        if($uid) {
            $magic = 1688;
            BizUserModel::create()->update(['invite_code'=>( $uid+$magic)],['uid'=>$uid]);

            if(!empty($bean->refcode)) {
                $data = [
                    'app'=>$user['app'],
                    'uid'=> ($bean->refcode - $magic),
                    'invitees'=>$uid,
                    'status'=>0, //未奖励
                    'type'=>'register',//注册邀请
                    'ip'=>$user['register_ip']
                ];
                $id  =  InviteModel::create($data)->save();
                track_info("新邀请用户入DB:".$id);

            }
            return $this->setRet(0,'succ',['uid'=>$id]);
        } else {
            return $this->setRet(1,'new user failed');
        }


    }

}