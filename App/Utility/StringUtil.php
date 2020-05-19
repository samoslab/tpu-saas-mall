<?php
/**
 * Created by PhpStorm.
 * Index: yao
 * Date: 19-2-15
 * Time: 下午3:39
 */

namespace App\Utility;


use EasySwoole\Utility\SnowFlake;

class StringUtil
{

    public static function getAccessToken ()
    {
        // 使用session_create_id()方法创建前缀
        $prefix = session_create_id(date('YmdHis'));
        // 使用uniqid()方法创建唯一i
        $request_id = md5(uniqid($prefix, true).self::getUUid());
        // 格式化请求id
        return $request_id;
    }



    public static function getUUid()
    {
        return SnowFlake::make(1,1);
    }

    public static function generatepasswd ($pwd)
    {
        return hash("sha256",$pwd . "samos is very good");
    }

    /**
     * 正则检测昵称
     *
     * @param $string
     *
     * @return bool
     */
    public static function checkNickName ($string)
    {
        if (preg_match("/^[a-zA-Z0-9_\x{4e00}-\x{9fa5}\.]+$/u", $string)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 检测支付宝账号
     *
     * @param $string
     *
     * @return bool
     */
    public static function checkAlipay ($string)
    {
        if (preg_match("/^(?:\w+\.?)*\w+@(?:\w+\.)+\w+|\d{9,11}$/", $string)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 检测微信号
     *
     * @param $string
     *
     * @return bool
     */
    public static function checkWechat ($string)
    {
        if (preg_match("/^[a-zA-Z]([-_a-zA-Z0-9]{5,19})+$/", $string)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 验证手机号
     *
     * @param $phone
     *
     * @return bool
     */
    public static function checkPhone ($phone)
    {
        if (preg_match("/^1[345678]\d{9}$/", $phone)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 验证身份证号
     *
     * @param $value
     *
     * @return bool
     */
    public static function checkIdcard ($value)
    {
        if (!preg_match('/^\d{17}[0-9xX]$/', $value)) { //基本格式校验
            return false;
        }

        $parsed = date_parse(substr($value, 6, 8));
        if (!(isset($parsed['warning_count'])
            && $parsed['warning_count'] == 0)) { //年月日位校验
            return false;
        }

        $base = substr($value, 0, 17);

        $factor = [7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2];

        $tokens = ['1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2'];

        $checkSum = 0;
        for ($i = 0; $i < 17; $i++) {
            $checkSum += intval(substr($base, $i, 1)) * $factor[ $i ];
        }

        $mod   = $checkSum % 11;
        $token = $tokens[ $mod ];

        $lastChar = strtoupper(substr($value, 17, 1));

        return ($lastChar === $token); //最后一位校验位校验
    }

    /**
     * 验证真实姓名
     *
     * @param $name
     *
     * @return bool
     */
    public static function checkRealname ($name)
    {
        $ret = true;
        if (!preg_match('/^[\x{4e00}-\x{9fa5}]+[·•]?[\x{4e00}-\x{9fa5}]+$/u', $name)) {
            return false;
        }
        $strLen = mb_strlen($name);
        if ($strLen < 2 || $strLen > 8) {//字符长度2到8之间
            return false;
        }

        return $ret;
    }

    /**
     * 检测银行卡号
     *
     * @param $bankCardNo
     *
     * @return bool
     */
    public static function checkBankacount ($bankCardNo)
    {
        $strlen = strlen($bankCardNo);
        if ($strlen < 15 || $strlen > 19) {

            return false;
        }

        return true; //下面规则有问题
        if (!preg_match("/^\d{15}$/i", $bankCardNo) && !preg_match("/^\d{16}$/i", $bankCardNo) &&
            !preg_match("/^\d{17}$/i", $bankCardNo) && !preg_match("/^\d{18}$/i", $bankCardNo) &&
            !preg_match("/^\d{19}$/i", $bankCardNo)) {

            return false;
        }

        $arr_no = str_split($bankCardNo);
        $last_n = $arr_no[ count($arr_no) - 1 ];
        krsort($arr_no);
        $i     = 1;
        $total = 0;
        foreach ($arr_no as $n) {
            if ($i % 2 == 0) {
                $ix = $n * 2;
                if ($ix >= 10) {
                    $nx    = 1 + ($ix % 10);
                    $total += $nx;
                } else {
                    $total += $ix;
                }
            } else {
                $total += $n;
            }
            $i++;
        }
        $total -= $last_n;
        $x     = 10 - ($total % 10);
        if ($x != $last_n) {

            return false;
        }

        return true;
    }

    /**
     * 得到base64编码
     *
     * @param $image_file
     *
     * @return string
     */
    public static function base64EncodeImage ($image_file)
    {
        $image_info   = getimagesize($image_file);
        $image_data   = fread(fopen($image_file, 'r'), filesize($image_file));
        $base64_image = 'data:' . $image_info['mime'] . ';base64,' . chunk_split(base64_encode($image_data));
        return $base64_image;
    }

    /**
     * 上传base64
     *
     * @param $base64_image_content
     * @param $path
     *
     * @return bool|string
     * @throws \Exception
     */
    public static function base64_image_content ($base64_image_content, $path)
    {
        //匹配出图片的格式
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)) {
            $type     = $result[2];
            $new_dir = self::getStaticPath() . "/{$path}/";
            if (!file_exists($new_dir)) {
                //检查是否有该文件夹，如果没有就创建，并给予最高权限
                mkdir($new_dir, 0700);
            }
            $uniqid = uniqid();
            $new_file = $new_dir . $uniqid . ".{$type}";
            if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)))) {
                return Common::uploadQiLiu($new_file);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * 得到Static路径
     * @return string
     */
    public static function getStaticPath ()
    {
        return dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'Static';
    }

    /**
     * 判断否为UTF-8编码
     *
     * @param $str
     *
     * @return bool
     */
    public static function is_utf8 ($str)
    {
        $len = strlen($str);
        for ($i = 0; $i < $len; $i++) {
            $c = ord($str[ $i ]);
            if ($c > 128) {
                if (($c > 247)) {
                    return false;
                } elseif ($c > 239) {
                    $bytes = 4;
                } elseif ($c > 223) {
                    $bytes = 3;
                } elseif ($c > 191) {
                    $bytes = 2;
                } else {
                    return false;
                }
                if (($i + $bytes) > $len) {
                    return false;
                }
                while ($bytes > 1) {
                    $i++;
                    $b = ord($str[ $i ]);
                    if ($b < 128 || $b > 191) {
                        return false;
                    }
                    $bytes--;
                }
            }
        }
        return true;
    }

    /**
     * 判断是否base64加密
     *
     * @param $str
     *
     * @return bool
     */
    public static function is_base64 ($str)
    {

        return preg_match('/base64/', $str);
////        return true;
//        //这里多了个纯字母和纯数字的正则判断
//        if (@preg_match('/^[0-9]*$/', $str) || @preg_match('/^[a-zA-Z]*$/', $str)) {
//            return false;
//        } elseif (self::is_utf8(base64_decode($str)) && base64_decode($str) != '') {
//            return true;
//        }
//        return false;
    }


    public static function moneyFormat($v) {
        $v = (string)$v;
        if(strpos($v,".")!==false) {
            $s = rtrim($v,'0');
            if($s=="") {
                return "0.0";
            } else if($s[strlen($s)-1]==".") {
                return $s."0";
            } else {
                return $s;
            }
        }
        return $v;

    }

    public static function rawMoneyFormat($v,$token) {
        if(in_array($token ,['TPU','NULS'])) {
            $v = floatval($v)/100000000;

        } else if(in_array($token,['GALT','SAMO','GK','GKI','HAIC'])) {
            $v = floatval($v)/1000000;
        }
//        $s = rtrim((string)$v,'0');
//        if($s=="" || $s[strlen($s)-1]==".") {
//            return $s."0";
//        }
        return $v;

    }

    public static function getDate($o,$ft= "Y-m-d H:i") {
        if(is_object($o)) {
           return date($ft, $o->toDateTime()->getTimestamp()  );
        } else if(is_numeric($o)) {
            return date($ft, $o);
        } else {
            return $o;
        }
    }
}
