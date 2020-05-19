<?php


namespace App\Utility;


use EasySwoole\EasySwoole\Config;

class BlockUtil
{

    private static function getAuthHeader()
    {
        $nonce = mt_rand(1, 100000);
        $expire = time() + 5;
        $secret = Config::getInstance()->getConf('BlockService.secret');
        $authsecret = $nonce . $expire . $secret;
        $auth = hash_hmac('sha256', $secret, $authsecret);
        return [
            'x-expire: ' . $expire,
            'x-nonce: ' . $nonce,
            'x-auth: ' . $auth
        ];

    }


    public static function request($url, $items)
    {


        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $items);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, self::getAuthHeader());

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            track_error('requset failed:'.$url."--".json_encode($items)."\n". curl_error($ch));

        }
        curl_close($ch);


        return $result;

    }

    public static function getRequestRet($url, $items)
    {
        $s = self::request($url, $items);
        track_info("getRequestRet from $url:\n".$s);
        $items = json_decode($s,true);
        if($items) {
            return $items;
        } else {
            return ['code'=>-1,'msg'=>'request failed','result'=>[]];
        }



    }
}
