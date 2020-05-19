<?php
/**
 * Class: openClient
 */

class OpenClient {
    //应用的appkey
    public $appKey;
    //密钥
    public $appSecret;
    //参数合法检测开关
    public $check_request = true;
    //接口地址
    public $api_url = "http://api.bm001.com/api";
    //数据格式
    public $format = "json";
    //版本
    protected $api_version = "1.1";
    //加密方法
    protected $sign_method = "sha1";

    //过滤字段
    private $ignore_keys = array("file","image","logo");
    /**
     * 加密请求参数
     * @param $params
     * @return string
     */
    protected function generateSign($params)
    {
        ksort($params);

        $sign_string = "";
        foreach ($params as $k => $v)
        {
            $sign_string .= $k.$v;
        }
        unset($k, $v);
        $sign_string = $this->appSecret.$sign_string.$this->appSecret;

        return strtoupper(call_user_func($this->sign_method,$sign_string));
    }

    /**
     * 发送http请求
     * @param $url
     * @param null $post_fields
     * @return null|void
     */
    public function request($url,$post_fields = null)
    {
        return QmHttp::send($url,$post_fields);
    }

    /**
     * 执行
     * @param $request
     * @param $access_token
     * @return mixed|ResultResp|SimpleXMLElement|void
     * @throws Exception
     */
    public function execute($request, $access_token)
    {

        //封装参数
        $api_params["appKey"] = $this->appKey;
        $api_params["format"] = $this->format;
        $api_params["method"] = $request->getApiMethodName();
        $api_params["v"] = $this->api_version;
        $api_params["timestamp"] = QmHelper::msectime();

       if(empty($access_token)){
           throw new Exception("Error:Invalid Arguments:the value of acceess_token can not be null." , 41);
           return;
       }else{
           $api_params["access_token"] = $access_token;
       }

        //获取应用参数
        $reqParams = $request->getApiParas();
        $filterParams = array();
        //过滤特定参数
        foreach($reqParams as $key => $value){
            if(!in_array($key,$this->ignore_keys)){
                $filterParams[$key] = $value;
            }
        }
        //签名
        $api_params["sign"] = $this->generateSign(array_merge($filterParams, $api_params));

        $request_url = $this->api_url . "?";
        foreach ($api_params as $pKey => $pValue)
        {
            $request_url .= "$pKey=" . urlencode($pValue) . "&";
        }
        $request_url = rtrim($request_url,"&");

        //发起HTTP请求
        try
        {
            $resp = $this->request($request_url,$reqParams);
        }
        catch (Exception $e)
        {
            $result = new ResultResp();
            $result->code = $e->getCode();
            $result->msg = $e->getMessage();
            return $result;
        }

        //解析返回结果
        if ("json" == $this->format)
        {
            $resp = json_decode($resp,true);
            if (null !== $resp)
            {
                foreach ($resp as $name => $resjson)
                {
                    $resp = $resjson;
                }
            }
        }
        else if("xml" == $this->format)
        {
            $resp = @simplexml_load_string($resp);

        }

        return $resp;
    }

}
