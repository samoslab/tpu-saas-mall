<?php
/**
 *存储器
 */

class FileStore {
    protected $store;

    protected $storeMap;

    protected $qmCrypt;
    function __construct(){
        if(!$this->qmCrypt instanceof QmCrypt ){
            $this->qmCrypt = new QmCrypt();
        }
        $this->storeMap = array();
    }
    /**
     * 新增
     * @param $key  文件名
     * @param $value    文件路径
     * @return bool
     */
    public function add($key,$value){
        if(isset($this->store[$key])){
            return false;
        }
        $dir_name = dirname($value);
        $crypt_key  = $this->qmCrypt->getCryptString($dir_name);
        if(isset($this->storeMap[$crypt_key])){
            $this->storeMap[$crypt_key]["count"]++;
            array_push($this->storeMap[$crypt_key]["name"],$key);
        }else{
            $this->storeMap[$crypt_key] = array("count"=>1,"dir"=>$dir_name,"name"=>array($key));
        }
        $this->store[$key] = $value;
        return true;
    }

    /**
     * 删除
     * @param $key  文件名
     * @return bool
     */
    public function delete($key){
        if (isset($this->store[$key]))
        {
            unset($this->store[$key]);
            return true;
        }
            return false;
    }

    /**
     * 更新
     * @param $key
     * @param $value
     * @return mixed
     */
    public function update($key,$value){
        if (isset($this->store[$key]))
        {
            $this->store[$key] = $value;
        }else{
            return fales;
        }
    }

    /**
     * 获取
     * @param $key
     * @return bool
     */
    public function get($key){
        if(isset($this->store[$key])){
            return $this->store[$key];
        }
        return false;

    }

    public function getAll(){
        return $this->storeMap;
    }
}