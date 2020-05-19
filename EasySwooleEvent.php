<?php
namespace EasySwoole\EasySwoole;


use EasySwoole\EasySwoole\Swoole\EventRegister;
use EasySwoole\EasySwoole\AbstractInterface\Event;
use EasySwoole\Http\Message\Status;
use EasySwoole\Http\Request;
use EasySwoole\Http\Response;
use App\Process\HotReload;
use EasySwoole\ORM\Db\Connection;
use EasySwoole\ORM\DbManager;
use EasySwoole\Tracker\Point;
use EasySwoole\Tracker\PointContext;
class EasySwooleEvent implements Event
{

    public static function initialize()
    {
        // TODO: Implement initialize() method.
        date_default_timezone_set('Asia/Shanghai');
        //database

        $configData = Config::getInstance()->getConf('MYSQL');
        $config = new \EasySwoole\ORM\Db\Config($configData);
        DbManager::getInstance()->addConnection(new Connection($config));


    }

    public static function mainServerCreate(EventRegister $register)
    {
        // TODO: Implement mainServerCreate() method.

        $swooleServer = ServerManager::getInstance()->getSwooleServer();
        $swooleServer->addProcess((new HotReload('HotReload', ['disableInotify' => false]))->getProcess());



    }

    public static function onRequest(Request $request, Response $response): bool
    {
        $allow_origin = array(
            "http://127.0.0.1",
        );

        $origin = $request->getHeader('origin');

        if ($origin !== []){
            $origin = $origin[0];
            if(in_array($origin, $allow_origin)){
                $response->withHeader('Access-Control-Allow-Origin', $origin);
                $response->withHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS');
                $response->withHeader('Access-Control-Allow-Credentials', 'true');
                $response->withHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With, token');
                if ($request->getMethod() === 'OPTIONS') {
                    $response->withStatus(Status::CODE_OK);
                    return false;
                }
            }
        }
        return true;
    }

    public static function afterRequest(Request $request, Response $response): void
    {

    }
}