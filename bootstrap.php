<?php


function ts() {
    return date("Y-m-d H:i:s")." ";
}

function config($keypath) {
    return \EasySwoole\EasySwoole\Config::getInstance()->getConf($keypath);
}

function track_error($msg) {
    if(is_array($msg) || is_object($msg)) {
        $msg = json_encode($msg,JSON_UNESCAPED_UNICODE);
    }
    $v =  ts()."|error|".$msg."\n";
    echo $v;
    error_log($v,3,RUNNING_ROOT."/Log/track.log");
}
function track_info($msg) {
    if(is_array($msg) || is_object($msg)) {
        $msg = json_encode($msg,JSON_UNESCAPED_UNICODE);
    }
    $v =  ts()."|info|".$msg."\n";
    echo $v;
    error_log($v,3,RUNNING_ROOT."/Log/track.log");
}
function track_debug($msg) {
    if(is_array($msg) || is_object($msg)) {
        $msg = json_encode($msg,JSON_UNESCAPED_UNICODE);
    }
    $v =  ts()."|info|".$msg."\n";
    echo $v;
    error_log($v,3,RUNNING_ROOT."/Log/track.log");
}
//mongodb to
function utc_to_ts($data) {
    if(is_object($data)) {
        return date("Y-m-d H:i:s",$data->toDateTime()->getTimestamp());

    }
    return $data;
}

function get_kv($o,$key) {
    if($o) {
        return isset($o[$key])?$o[$key]:"";
    }
    return "";
}

function getObjectId($oid) {
    return new MongoDB\BSON\ObjectId($oid);
}

//\EasySwoole\EasySwoole\Command\CommandContainer::getInstance()->set(new \AutomaticGeneration\Generation());
//$init = new \AutomaticGeneration\Init();
//$init->initBaseModel();
//$init->initBaseController();