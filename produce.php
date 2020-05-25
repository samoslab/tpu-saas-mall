<?php

namespace TPU\DDL;

use App\HttpController\App;

use App\Model\Mall\CategoryModel;
use App\Model\Mall\GoodsModel;
use App\Model\Platform\InviteModel;

use App\Utility\AppConst;
use App\Utility\RequestUtil;
use App\Utility\StringUtil;
use EasySwoole\EasySwoole\Config;
use EasySwoole\ORM\Db\Connection;
use EasySwoole\ORM\DbManager;
use MongoDB\BSON\UTCDateTime;

defined('IN_PHAR') or define('IN_PHAR', boolval(\Phar::running(false)));
defined('RUNNING_ROOT') or define('RUNNING_ROOT', realpath(getcwd()));
defined('EASYSWOOLE_ROOT') or define('EASYSWOOLE_ROOT', IN_PHAR ? \Phar::running() : realpath(getcwd()));
define('EASYSWOOLE_WEB_SERVER',1);

$file = EASYSWOOLE_ROOT.'/vendor/autoload.php';
if (file_exists($file)) {
    require $file;
}else{
    die("include composer autoload.php fail\n");
}

if(file_exists(EASYSWOOLE_ROOT.'/bootstrap.php')){
    require_once EASYSWOOLE_ROOT.'/bootstrap.php';
}

$file = EASYSWOOLE_ROOT . '/dev.php';

Config::getInstance()->loadEnv($file);


//echo InviteModel::create()->getDDL();
//echo CategoryModel::create()->getDDL();
echo GoodsModel::create()->getDDL();