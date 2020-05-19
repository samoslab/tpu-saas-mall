<?php
/**
 * Created by PhpStorm.
 * Index: zhuzhu
 * Date: 19-4-15
 * Time: 上午10:30
 */

namespace App\Utility;


use EasySwoole\EasySwoole\Config;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;

class Common
{
    public static function concatAppidUid ($appid, $uid)
    {
        return "{$appid}-{$uid}";
    }

    public static function explodeAppidUid ($appiduid)
    {
        list($appid, $uid) = explode('-', $appiduid);
        return [
            'appid' => $appid,
            'uid'   => $uid,
        ];
    }

    /**
     * 将数组按字母A-Z排序
     * @return [type] [description]
     */
    public static function chartSort ($array)
    {
        $user = $array;
        foreach ($user as $k => &$v) {
            $v['chart'] = self::getFirstChart($v['nickname']);//user_name替换为自己数组中的需要排序的字段名称然后调用chartSort方法就OK
        }
        $data = [];
        foreach ($user as $k => $vv) {
            if (empty($data[ $vv['chart'] ])) {
                $data[ $vv['chart'] ] = [];
            }
            $data[ $vv['chart'] ][] = $vv;
        }
        ksort($data);
        return $data;
    }

    /**
     * 返回取汉字的第一个字的首字母
     *
     * @param  [type] $str [string]
     *
     * @return [type]      [strind]
     */
    public static function getFirstChart ($str)
    {
        if (empty($str)) {
            return '';
        }
        $char = ord($str[0]);
        if ($char >= ord('A') && $char <= ord('z')) {
            return strtoupper($str[0]);
        }
        $s1  = iconv('UTF-8', 'gb2312', $str);
        $s2  = iconv('gb2312', 'UTF-8', $s1);
        $s   = $s2 == $str ? $s1 : $str;
        $asc = ord($s{0}) * 256 + ord($s{1}) - 65536;
        if ($asc >= -20319 && $asc <= -20284) return 'A';
        if ($asc >= -20283 && $asc <= -19776) return 'B';
        if ($asc >= -19775 && $asc <= -19219) return 'C';
        if ($asc >= -19218 && $asc <= -18711) return 'D';
        if ($asc >= -18710 && $asc <= -18527) return 'E';
        if ($asc >= -18526 && $asc <= -18240) return 'F';
        if ($asc >= -18239 && $asc <= -17923) return 'G';
        if ($asc >= -17922 && $asc <= -17418) return 'H';
        if ($asc >= -17417 && $asc <= -16475) return 'J';
        if ($asc >= -16474 && $asc <= -16213) return 'K';
        if ($asc >= -16212 && $asc <= -15641) return 'L';
        if ($asc >= -15640 && $asc <= -15166) return 'M';
        if ($asc >= -15165 && $asc <= -14923) return 'N';
        if ($asc >= -14922 && $asc <= -14915) return 'O';
        if ($asc >= -14914 && $asc <= -14631) return 'P';
        if ($asc >= -14630 && $asc <= -14150) return 'Q';
        if ($asc >= -14149 && $asc <= -14091) return 'R';
        if ($asc >= -14090 && $asc <= -13319) return 'S';
        if ($asc >= -13318 && $asc <= -12839) return 'T';
        if ($asc >= -12838 && $asc <= -12557) return 'W';
        if ($asc >= -12556 && $asc <= -11848) return 'X';
        if ($asc >= -11847 && $asc <= -11056) return 'Y';
        if ($asc >= -11055 && $asc <= -10247) return 'Z';
        return null;
    }


    /**
     * 判断数组是否为索引数组
     */
    public static function is_indexed_array($arr)
    {
        if (is_array($arr)) {
            return count(array_filter(array_keys($arr), 'is_string')) === 0;
        }
        return false;
    }
    /**
     * 判断数组是否为连续的索引数组
     * 以下这种索引数组为非连续索引数组
     * [
     *   0 => 'a',
     *   2 => 'b',
     *   3 => 'c',
     *   5 => 'd',
     * ]
     */
    public static function is_continuous_indexed_array($arr)
    {
        if (is_array($arr)) {
            $keys = array_keys($arr);
            return $keys == array_keys($keys);
        }
        return false;
    }
    /**
     * 判断数组是否为关联数组
     */
    public static function is_assoc_array($arr)
    {
        if (is_array($arr)) {
            // return !is_indexed_array($arr);
            return count(array_filter(array_keys($arr), 'is_string')) === count($arr);
        }
        return false;
    }
    /**
     * 判断数组是否为混合数组
     */
    public static function is_mixed_array($arr)
    {
        if (is_array($arr)) {
            $count = count(array_filter(array_keys($arr), 'is_string'));
            return $count !== 0 && $count !== count($arr);
        }
        return false;
    }

    /**
     * 得到七牛云Token
     *
     * @return string
     */
    public static function getToken ()
    {
        $accessKey = 'ml7ZULMI5-qDwnrqn9wxXOjlmjWsZasDqTOejph1';
        $secretKey = 'jSD3-g8vT0T2-hzy6b4tSQR9XWKtwGvl1LGWZ9Tg';
        $bucket = 'haifun';

        $auth = new Auth($accessKey, $secretKey);
        return $auth->uploadToken($bucket);
    }

    /**
     * 上传图片到七牛云
     *
     * @param $filePath
     *
     * @return string
     * @throws \Exception
     */
    public static function uploadQiLiu ($filePath)
    {
        $token = self::getToken();
        $uploadMgr = new UploadManager();
        list($ret, $err) = $uploadMgr->putFile($token, null, $filePath);
        if ($err !== null) {
            $static_http_path = Config::getInstance()->getConf('STATIC_PATH');
            return preg_replace('/.*Static/i', $static_http_path, $filePath);
        } else {
            return sprintf("http://store.yqkkn.com/%s", $ret['key']);
        }
    }

}
