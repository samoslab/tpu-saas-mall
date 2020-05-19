<?php
/**
 * 检测静态类
 */

class RequestCheckUtil {

    /**
     *  校验字段 fieldName 的值$value非空
     * @param $value
     * @param $fieldName
     * @throws Exception
     */
    public static function checkNotNull($value,$fieldName) {

        if(self::isEmpty($value)){
            throw new Exception("client-check-error:Missing Required Arguments: " .$fieldName , 40);
        }
    }

    /**
     * 检验字段fieldName的值value是否是数字
     * @param $num
     * @param $field
     * @throws Exception
     */
    public static function isNum($num,$field){
        if(!is_numeric($num)){
            throw new Exception("Error:Invalid Arguments:the value of " . $field . " is not number : " . $num . " ." , 41);
        }
    }

    /**
     *  校验$value是否非空
     * @param $value
     * @return bool
     */
    public static function isEmpty($value) {
        if(!isset($value))
            return true ;
        if($value === null )
            return true;
        if(trim($value) === "")
            return true;
        if(empty($value))
            return true;
        return false;
    }

}