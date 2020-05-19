<?php
/**
 * 保存配置文件至本地目录
 * 注：部分系统需拥有读、写权限
 */

class FileMap {

    protected $map_dir = "/tmp/";

    protected $map_name = "map.json";
    //默认：一天；存储只保留一天，每天第一次运行会更新文件
    public $life_time = 1;
    //天：day，小时：hour,分钟：min
    public $unit = "day";
    /**
     * 已存储
     * @return bool|string
     */
    public function hasMap(){
        $file_path = $this->map_dir.$this->map_name;
        if(file_exists($file_path)){
            $time_format = "y-m-d h:i:s";
            $create_file_time = date($time_format,filectime($file_path));
            $now = date($time_format);
            //配置默认一天更新一次
            $diff = QmHelper::dateTimeDiff($create_file_time,$now);
            if($diff[$this->unit] > $this->life_time){
                $this->delete();
                return false;
            }
            return $file_path;
        }
        return false;
    }

    /**
     * 加载map
     * @return bool|string
     */
    public function loadMap(){
        if($file_path = $this->hasMap()){
            $content = file_get_contents($file_path);

            if(!isset($content) || empty($content)){
                $this->delete();
                return false;
            }
            return $content;
        }
        return false;
    }

    /**
     * 保存map
     * @param $value
     */
    public function saveMap($value){
        if($file_path = $this->hasMap()){
            $this->delete();
        }else{
            $file_path = $this->map_dir.$this->map_name;
        }
        file_put_contents($file_path,$value);
    }

    /**
     * 删除
     */
    public function delete(){
        $file_path = $this->map_dir.$this->map_name;
        if(file_exists($file_path) && is_writeable($file_path)){
            unlink($file_path);
        }
            
    }
}