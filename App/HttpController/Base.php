<?php

namespace App\HttpController;

use App\Utility\CacheTools;
use EasySwoole\EasySwoole\ServerManager;
use EasySwoole\Http\AbstractInterface\AnnotationController;
use EasySwoole\Http\AbstractInterface\Controller;
use EasySwoole\Validate\Validate;


class Base extends Controller
{
//    protected $form;
//    protected $ip;
//    protected $accessToken;
//    protected $app;

    function index() {}

    public function getObjectId($oid) {
        return  new MongoDB\BSON\ObjectId($oid);
    }
    protected function getUid() {
        $info = $this->getLoginInfo();
        if($info) {
            return intval($info['uid']);
        } else {
            return 0;
        }

    }


    public function getForm() {
        $appHeader = $this->request()->getHeader("content-type");
        if($appHeader && strpos($appHeader[0] ,"application/json;")!==false) {
            return $this->json();
        }


        return $this->request()->getRequestParam();
    }

    public function getApp() {
        $appHeader = $this->request()->getHeader("x-app");
        if(!empty($appHeader)) {
            $app=$appHeader[0];
        }else  {
            $form = $this->getForm();
            if(!empty($form['app'])) {
                $app = $form['app'];
            } else {
                $info = $this->getLoginInfo();
                $app = get_kv($info,$info['app']);
            }
        }

        return $app;
    }

    public function getInfo() {
        return ServerManager::getInstance()->getSwooleServer()->connection_info($this->request()->getSwooleRequest()->fd);

    }

    /**
     * 获取用户的真实IP
     * @param string $headerName 代理服务器传递的标头名称
     * @return string
     */
    public function getIp($headerName = 'x-real-ip')
    {
        $server = ServerManager::getInstance()->getSwooleServer();
        $client = $server->getClientInfo($this->request()->getSwooleRequest()->fd);
        $clientAddress = $client['remote_ip'];
        $xri = $this->request()->getHeader($headerName);

        // $headers $this->request()->getHeaders();

        $xff = $this->request()->getHeader('x-forwarded-for');
        if ($clientAddress === '127.0.0.1')
        {
            if (!empty($xri))
            {  // 如果有xri 则判定为前端有NGINX等代理
                $clientAddress = $xri[0];
            }
            elseif (!empty($xff))
            {  // 如果不存在xri 则继续判断xff
                $list = explode(',', $xff[0]);
                if (isset($list[0])) $clientAddress = $list[0];
            }
        }
        return $clientAddress;

    }

    public function getAccessToken() {
        $accessHeader = $this->request()->getHeader("x-auth");
        $form = $this->getForm();
        if(!empty($accessHeader)) {
            $accessToken=$accessHeader[0];
        }else  if(!empty($form['x-auth'])) {
            $accessToken =$form['x-auth'];
        } else {
            $accessToken="";
        }
        return $accessToken;
    }







    protected function onRequest(?string $action): ?bool
    {

        $headers = $this->request()->getHeaders();
//        var_dump($headers);
        if(!empty($headers['origin'])) {
            $origin = $headers['origin'][0];
            $this->response()->withHeader("Access-Control-Allow-Origin",$origin);
            track_debug($origin);

        } else {
            $this->response()->withHeader("Access-Control-Allow-Origin","https://tpu.yqkkn.com");
            track_debug("no origin");
        }

        //  $this->response()->withHeader("Access-Control-Allow-Origin","*");

//        $this->response()->withHeader("Access-Control-Allow-Origin","http://localhost:9901");

        // $this->response()->withHeader("Access-Control-Allow-Methods","*");
        $this->response()->withHeader("Access-Control-Allow-Credentials","true");


        $this->response()->withHeader("Access-Control-Request-Headers","Origin, X-Requested-With, content-Type, Accept, Authorization");
        $this->response()->withHeader("Access-Control-Allow-Headers","Access-Control-Allow-Origin,content-type,X-Requested-With,token,x-app,x-auth,X-TPU-Admin-Token");

        track_info($this->getApp()."|".$this->getUid()."|".$this->request()->getUri()."|".$this->getIp());
        $form = $this->getForm();
        track_debug("Form:".json_encode($form,JSON_UNESCAPED_UNICODE));

        $method = $this->request()->getMethod();
//        track_debug($method);
        if($method == "OPTIONS") {
            $this->response()->withStatus(200);
            return false; //直接返回header
        }

        //必须有App参数
        $app = $this->getApp();
        if(empty($app)) {
            $uri = $this->request()->getUri();
            if(!(strpos($uri,"wx/index/info/")===false)) {
                $this->writeJson(1000,'','app');
                track_error($this->getIp()."|缺App参数");
                return false;
            }

        }


//        var_dump($this->getForm());
//        echo $this->getAccessToken()."\n";
//        echo $this->getUid()."\n";
//        echo "token\n";
//
//        var_dump($this->getAccessToken());
//        echo "uid\n";
//
//        var_dump($this->getUid());


        $v = $this->validateRule($action);
//        echo "validate\n";
        if($v){
            $ret = $this->validate($v);
            if($ret == false){
//                 var_dump( $v->getError());
                $ret = $this->setRet(1,'',$v->getError()->getErrorRuleMsg());
                $this->writeRet($ret);
                return false;
            }
        }
        return true;
    }

    protected function validateRule(?string $action):?Validate
    {
        return null;
    }

    public function get($key) {
        $form = $this->getForm();
        return get_kv($form,$key);
    }

    //子类里面不一定有
    protected function getLoginInfo()
    {
        $redis = CacheTools::getRedis();
        $accessToken = $this->getAccessToken();
        $info = $redis->get($accessToken);
        return json_decode($info,true);
    }







    public function succOut() {
        $this->writeRet();
    }
    public function errOut($code=1,$msg="") {
        $this->writeRet(['code'=>$code,'msg'=>$msg]);
    }

    public function writeRet($ret=[]) {
        if (!$this->response()->isEndResponse()) {
            if(!isset($ret['result'])) {
                $ret['result']=null;
            }
            if(!isset($ret['code'])) {
                $ret['code']=0;
            }
            if(!isset($ret['msg'])) {
                $ret['msg']="";
            }


            $ret = json_encode($ret, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            $this->response()->write($ret);
            $this->response()->withHeader('Content-type', 'application/json;charset=utf-8');
            $this->response()->withStatus(200);
            $this->response()->end();
            return true;
        } else {
            return false;
        }
    }
    function setRet($code,$msg="",$result=[]) {
        return ['code'=>$code,'msg'=>$msg,'result'=>$result];
    }


    public function getSkipNum() {
        $page = intval($this->get('page'));
        $pageSize = config('pagesize');
        if($page>0) {
            return ($page-1)*$pageSize;
        } else {
            return 0;
        }
    }

    public function getPage() {
        $page = intval($this->get('page'));
        if($page>0) {
            return $page;
        } else {
            return 1;
        }
    }
//    public function gc() {
//        parent::gc();
//        $this-> form="";
//        $this->  ip="";
//        $this-> accessToken="";
//        $this->  accessApp="";
////        track_info(__METHOD__);
//    }
}
