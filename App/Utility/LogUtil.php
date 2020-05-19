<?php


namespace App\Utility;
use EasySwoole\EasySwoole\Logger;


class LogUtil
{

    public static  function debugAndLog($data,$category="biz_log") {
        ob_start();
        var_dump($data);
        $str = ob_get_contents();
        ob_end_clean();

        Logger::getInstance()->log($str,$category);
    }

}