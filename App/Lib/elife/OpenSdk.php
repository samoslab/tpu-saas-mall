<?php
/**
 *  千米开放平台-PHP版本SDK
 *  version:beta 0.0.1
 *  说明：本版本SDK，适应于PHP5以上版本
 *  包含了千米开放平台的云销、E生活API和相应的请求、加密、返回解析等一些必要的功能，
 *  接口代码文件由程序自动生成
 *  可以根据项目需求，主动不加载FileMap,FileStore和QmLoader等文件,用户可自行抉择；
 */
date_default_timezone_set('UTC');
if(!defined("DS")){
    define("DS",DIRECTORY_SEPARATOR);
}
if(!defined("EOL")){
    define("EOL",PHP_EOL);
}
//当前目录设置
if(!defined("CURRENT_FILE_DIR")){
    define("CURRENT_FILE_DIR",dirname(__FILE__));
}

//php文件检测
function is_php($file){
    return substr(strrchr($file, '.'), 1) == "php";
}
include(CURRENT_FILE_DIR.DS."loader".DS."QmHelper.php");
include(CURRENT_FILE_DIR.DS."loader".DS."QmCrypt.php");
include(CURRENT_FILE_DIR.DS."loader".DS."FileStore.php");
include(CURRENT_FILE_DIR.DS."loader".DS."FileMap.php");

/**
 * 加载器会根据传入扫描的目录，将map（类=》路径）存入变量
 */
include(CURRENT_FILE_DIR.DS."loader".DS."QmLoader.php");


