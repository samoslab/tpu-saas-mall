<?php


namespace App\Utility;


class Hash
{
    public static function make($value, array $options = [])
    {
        $hash = password_hash($value, PASSWORD_BCRYPT,$options);
        if ($hash === false) {
            throw new RuntimeException('Bcrypt hashing not supported.');
        }
        return $hash;
    }

    public static function check($value, $hashedValue)
    {
        if (strlen($hashedValue) === 0) {
            return false;
        }
        return password_verify($value, $hashedValue);
    }

    public static function sign($items,$fields=[]) {
        $key = config('db_sign_key');
        $str = '';
        foreach ($fields as $k) {
            $str .= $items[$k];
        }
        hash_hmac('md5',$str,$key);


    }
}
