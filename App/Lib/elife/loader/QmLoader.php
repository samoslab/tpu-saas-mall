<?php
/**
 * Class: QmLoader
 * 自动加载器
 * 覆盖系统autoload函数
 * 会根据传入的扫描目录，自动include类
 * 注意：1.类名必须和文件名保持一致。（后缀名除外）
 *      2.部分系统需拥有读、写权限
 */

class QmLoader {

    //需自动加载的目录
    public $autoload_path = array();

    //目录存储功能（默认开启）
    public $open_local_storage = true;

    //本地存储类
    protected $file_map;
    //存储类
    protected $file_store;


    public function init(){
        if(!is_object($this->file_map)){
            $this->file_map = new FileMap();
        }
        if(!is_object($this->file_store)){
            $this->file_store = new FileStore();
        }

        spl_autoload_register(array($this, "loadFile"));
    }
    public function autoload(){
        $autoload_path = $this->cleanPath($this->autoload_path);

        foreach($autoload_path as $index=>$path) {
            if (!is_readable($path)) {
                unset($autoload_path[$index]);
            }
        }

        //保存到本地
        if($this->open_local_storage){
            if( !$this->file_map->hasMap()){
                $this->scanDirs($autoload_path);
                $store = json_encode($this->file_store->getAll());
                //保存为json
                $this->file_map->saveMap($store);
            }else if($obdt = $this->file_map->loadMap()){
                $file_map = json_decode($obdt);
                foreach($file_map as $crypt => $items){
                    foreach($items->name as  $name){
                        $this->addFileStore($items->dir."/".$name.".php");
                    }
                }
            }else{
                trigger_error("Error:map.json file has no content ",E_USER_ERROR);
            }
        }else{
            $this->scanDirs($autoload_path);
        }

    }
    protected function scanDirs($dirs){

        $i = 0;
        while(isset($dirs[$i])){
            $dir = $dirs[$i];
            $files = scandir($dir);
            foreach ($files as $file) {
                if (in_array($file, array(".", "..")))
                {
                    continue;
                }
                $currentFile = $dir . "/" . $file;
                if (is_php($file) && is_file($currentFile))
                {
                    $this->addFileStore($currentFile);
                }
                else if (is_dir($currentFile))
                {
                    $dirs[] = $currentFile;
                }
            }
            $i++;
        }

    }
    protected function getClassName($path){
        if(preg_match("/\\/([^\\/]+?)\\.(?:php)$/",$path, $matches)){
            return $matches[1];
        }
        return false;
    }
    protected function cleanPath($path){
        $res = array();
        if(!is_array($path)){
            $path = array($path);
        }

        foreach($path as $no => $file_path){
            $file_path = str_replace("\\","/",trim($file_path));
            $res[] = $file_path;
        }
        return $res;
    }
    protected function addFileStore($file){

        $className = $this->getClassName($file);
        if(!$this->file_store->get($className)){
            $this->file_store->add($className,$file);
        }else{
            $this->file_store->update($className,$file);
        }


    }
    protected function loadFile($class){
        if($file_path = $this->file_store->get($class)){
            include($file_path);
        }
    }
}