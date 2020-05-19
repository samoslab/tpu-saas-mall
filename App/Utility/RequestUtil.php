<?php


namespace App\Utility;


use EasySwoole\EasySwoole\Config;

class RequestUtil
{

    private static function  getAuthHeader() {
         $nonce =  mt_rand(1,100000);
        $expire =  time()+5;
        $secret = Config::getInstance()->getConf('BlockService.secret');
        $authsecret = $nonce.$expire.$secret;
        $auth = hash_hmac('sha256',$secret,$authsecret);
        return [
            "x-expire: ".$expire,
            "x-nonce: ".$nonce,
            "x-auth: ".$auth,
            "Content-Type: application/json"
        ];

    }


    private static function  getNULSHeader() {
        $nonce =  mt_rand(1,100000);
        $expire =  time()+5;
        $secret = Config::getInstance()->getConf('BlockService.secret');
        $authsecret = $nonce.$expire.$secret;
        $auth = hash_hmac('sha256',$secret,$authsecret);
        return [
            "x-expire: ".$expire,
            "x-nonce: ".$nonce,
            "x-auth: ".$auth,
            "Content-Type: application/json;charset=UTF-8"
        ];

    }


    public static function requestNULS($url,$items) {


        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($items));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);

        $headers = self::getNULSHeader();
       // $headers[] = 'Content-Type: application/json';

//        var_dump($headers);

        curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            curl_error($ch);
            track_error($url."|".curl_error($ch));
        }
        curl_close($ch);
        return json_decode($result,true);

    }

    public static function request($url,$items) {
        $str = json_encode($items);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS,$str);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, self::getAuthHeader());

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            curl_error($ch);
        }
        curl_close($ch);
        return $result;

    }

    public static function requestJSON($url,$items) {
        $str = json_encode($items);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS,$str);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, self::getAuthHeader());

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            curl_error($ch);
        }
        curl_close($ch);
        return $result;

    }

    public static function postRequest($url,$items,$headers =[]) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS,$items);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            track_error(" postRequest($url,$items,$headers =[]) failed:".curl_error($ch));
        }
        curl_close($ch);
        return $result;
    }

    public static function getRequest($url,$items=[],$headers =[]) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            track_error(" getRequest($url,$items,$headers =[]) failed:".curl_error($ch));
        }
        curl_close($ch);
        return $result;
    }


}
