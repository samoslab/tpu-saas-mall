<?php
/**
 * 加密类
 */

class QmCrypt {
    //private $salt = "OPENSDK";

    public function getCryptString($string){
        return $this->cryptTo($string);
    }

    public function isEqual($crypt_string,$string){
        return $this->getCryptString($string) == $crypt_string;
    }

    protected function cryptTo($string){
        return md5($string);
    }
}