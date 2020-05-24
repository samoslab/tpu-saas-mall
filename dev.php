<?php
return [
    'SERVER_NAME' => "EasySwoole",
    'MAIN_SERVER' => [
        'LISTEN_ADDRESS' => '0.0.0.0',
        'PORT' => 9601,
        'SERVER_TYPE' => EASYSWOOLE_WEB_SERVER, //可选为 EASYSWOOLE_SERVER  EASYSWOOLE_WEB_SERVER EASYSWOOLE_WEB_SOCKET_SERVER,EASYSWOOLE_REDIS_SERVER
        'SOCK_TYPE' => SWOOLE_TCP,
        'RUN_MODEL' => SWOOLE_PROCESS,
        'SETTING' => [
            'worker_num' => 8,
            'reload_async' => true,
            'max_wait_time'=>3
        ],
        'TASK'=>[
            'workerNum'=>4,
            'maxRunningNum'=>128,
            'timeout'=>15
        ]
    ],
    'TEMP_DIR' => null,
    'LOG_DIR' => null,
    'MYSQL'  => [
        'host'          => '127.0.0.1',
        'port'          => 3306,
        'user'          => 'root',
        'password'      => '123456',
        'database'      => 'saas',
        'timeout'       => 5,
        'charset'       => 'utf8mb4',
    ],
    'MongoDB'=>[
        'host'=>'mongodb://127.0.0.1:27017/tpu',
        'db'=>'tpu',
        'username'=>'',
        'password'=>'',
        // 'rs'=>'rs0'
    ],
    'REDIS'=>[
        'host'=>'127.0.0.1',
        'port'=>6379,
        'POOL_TIME_OUT'=>3,
//        'auth'=>'foobaredsksksksk198'
        'auth'=>''

    ],

    'Security'=>[
        'sms_phone_limit'=>3,
        'sms_did_limit'=>3,
        'sms_ip_limit'=>50,
        'sms_expire_time'=>300
    ],
    'sms'=>[
        'appid'=>'1400184142',
        'appkey'=>'55c52a92c6d58fabd5288842d686b560'

    ],

];
