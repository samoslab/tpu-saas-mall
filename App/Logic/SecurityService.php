<?php


namespace App\Logic;


use App\Model\Platform\SmsModel;
use App\Utility\CacheTools;
use App\Utility\StringUtil;
use EasySwoole\Component\Singleton;
use EasySwoole\EasySwoole\Config;
use Nette\Utils\Random;
use Qcloud\Sms\SmsSingleSender;

class SecurityService extends BaseService
{

    use Singleton;


    public function sendSms($app,$sid,$phone,$op,$delta,$code,$ip='127.0.0.1',$nation="86") {

        $ts = time();

        $minute = round($delta/60);
        $expire = $ts+$delta;
        echo $ts."-".$delta;
        //save to redis
        $redis = CacheTools::getRedis();
        $value = ['app'=>$app,'op'=>$op, 'nation'=>$nation,'phone'=>$phone, 'code'=>$code,'ip'=>$ip];
        $v = json_encode($value);

        $redis->setEx($sid, $expire, $v);



        //TODO: 根据平台自己的设置
        $appid =  Config::getInstance()->getConf('sms.appid');
        $appkey =  Config::getInstance()->getConf('sms.appkey');
        try {
            $msg="【丰栊科技】{$code}为您的验证码，请于{$minute}分钟内填写。如非本人操作，请忽略本短信。";
            $ssender = new SmsSingleSender($appid, $appkey);
            $result = $ssender->send(0, $nation, $phone, $msg, "", "");

            $items = json_decode($result,true);



            //save to db
            if($items['result'] != 0) {
                $errmsg=$items['errmsg'];
                $ret =  ['code'=>1,'result'=>['sid'=>$sid],'msg'=>$items['errmsg']];
            } else {
                $errmsg="";
                $ret =  ['code'=>0,'result'=>['sid'=>$sid],'msg'=>'验证码发送成功'];

            }

            $item=[
                'app'=>$app,
                'nation'=>$nation,
                'sid'=>$sid,
                'op'=>$op,
                'phone'=>$phone,
                'code'=>$code,
                'expire'=>$expire,
                'errmsg'=>$errmsg,
                'msg'=>$msg,
                'ip'=>$ip,


            ];
            SmsModel::create($item)->save();


            return $ret;

        } catch(\Exception $e) {
            echo ts().__METHOD__."|0|发送验证码失败|".$e->getMessage()."\n";
            return ['code'=>1,'result'=>['sid'=>$sid],'msg'=>'发送验证码失败'];

        }


    }




    /**
     * 尝试发送用户验证码
     *
     * @param        $phone
     * @param string $op
     *
     * @return array
     */
    public function trySendUserValidateCode($app,$nation,$phone, $op = 'register',$ip) {
//       var_dump( func_get_args());

        $code = \EasySwoole\Utility\Random::number(6);
        $expire =  Config::getInstance()->getConf('Security.sms_expire_time');
        $sid = Random::makeUUIDV4();

        return $this->sendSms($app,$sid,$phone,$op,$expire,$code,$ip,$nation);
    }



    /**
     * @param $sid
     * @param $code
     * 注册的时候必须验证phone，在日程工作的时候不需要验证phone，
     * ip移动网络原因不验证
     */
    public function checkSidCode($app,$sid,$code,$phone="") {


        $redis =CacheTools::getRedis();
        $data  =$redis->get($sid);


        $items = json_decode($data,true);
//        var_dump($items);
        $ret =  ['code'=>1,'msg'=>'验证码不对','result'=>$code];
        if(!empty($items) && $items['code']==$code && $items['app']==$app ) {
            if(!empty($phone)) {
                if($phone == $items['phone'] && $app==$items['app']) {
                    $ret =  ['code'=>0,'msg'=>'验证码正确','result'=>$items['nation']];
                } else {
                    $ret =  ['code'=>1,'msg'=>'验证码不对','result'=>$code];

                }
            } else {
                $ret =  ['code'=>0,'msg'=>'验证码正确','result'=>$code];
            }
        }
        if($code == 111111) { //for debug only
            return ['code'=>0,'msg'=>'验证码正确','result'=>'86'];
        }
        return $ret;

    }

}