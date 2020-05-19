<?php

/**
 * Index: local_xiaoma
 * Date: 2015/4/1
 * Time: 13:20
 * Class HttpCurl
 * http请求静态类
 */

class QmHttp {

    //连接超时
    public $connect_timeout;
    //通信超时
    public $read_timeout = 30;

    public static function send($url,$postFields = null){
        $response = null;
        //如果不支持curl方式，就改用其它方式发送请求
        if(function_exists("curl_init")){
            $response = self::curl_request($url,$postFields);
        }else{
            $response = self::get_request($url,$postFields);
        }

        return $response;
    }

    /**
     * curl方式请求
     * @param $url
     * @param null $postFields
     * @return mixed
     * @throws Exception
     */
    protected static function curl_request($url,$postFields = null){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FAILONERROR, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        if (isset(self::$read_timeout)) {
            curl_setopt($ch, CURLOPT_TIMEOUT, self::readTimeout);
        }
        if (isset(self::$connect_timeout)) {
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, self::connectTimeout);
        }
        //https 请求
        if(strlen($url) > 5 && strtolower(substr($url,0,5)) == "https" ) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        }

        if (is_array($postFields) && count($postFields) > 0)
        {
            $postBodyString = "";
            foreach ($postFields as $k => $v)
            {
                $postBodyString .= "$k=" . urlencode($v) . "&";
            }
            unset($k, $v);
            curl_setopt($ch, CURLOPT_POST, true);

            curl_setopt($ch, CURLOPT_POSTFIELDS, rtrim($postBodyString));

        }
        $reponse = curl_exec($ch);

        if (curl_errno($ch))
        {
            throw new Exception(curl_error($ch),0);
        }
        else
        {
            $http_status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if (200 !== $http_status_code)
            {
                throw new Exception($reponse,$http_status_code);
            }
        }
        curl_close($ch);

        return $reponse;
    }

    /**
     * http请求
     * @param $url
     * @param null $postFields
     * @return string
     * @throws Exception
     */
    protected static function get_request($url,$postFields = null){
        try{
            $context = array("http"=>array("header"=>"Content-Type:application/x-www-form-urlencoded; charset=utf-8;".EOL));

            if(isset(self::$read_timeout)){
                $context["http"]["timeout"] = self::$read_timeout;
            }

            if (is_array($postFields) && count($postFields) > 0){
                $query_params = http_build_query($postFields,"","&");

                $context["http"]["method"] = "POST";
                $context["http"]["content"] = $query_params;
                $context["http"]["header"] .= "Content-Length:".strlen($query_params).EOL;
            }else{
                $context["http"]["method"] = "GET";
            }

            return file_get_contents($url, false, stream_context_create($context));
        }catch (Exception $e){
            throw $e;
        }

    }
}
