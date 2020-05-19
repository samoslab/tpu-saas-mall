<?php

/**
 * PHP,AES加解密类
 *
 */
class Aes{

    const CIPHER = MCRYPT_RIJNDAEL_128;

    const MODE = MCRYPT_MODE_CBC;

    const COUNT = 16;
    /**
     * 加密方法
     * @param string $content
     * @param string $secret_key
     * @return string
     */
    public static function encrypt($content,$secret_key){
        $length = self::COUNT;
        if(empty($content)){
          throw new Exception("Error: Missing required arguments: encrypt content");
        }
        if(empty($secret_key) || strlen(trim($secret_key)) < $length){
          throw new Exception("Error: Invalid arguments:encrypt secret key!");
        }

        $secret_key = substr($secret_key,0,$length);
        $content = trim($content);
        $iv = $secret_key;
        $encrypt_content =  mcrypt_encrypt(self::CIPHER, $secret_key, $content, self::MODE, $iv);
        return base64_encode($encrypt_content);
    }

    /**
     * 解密方法
     * @param string $content
     * @param string $secret_key
     * @return string
     */
    public static function decrypt($content,$secret_key){
        $length = self::COUNT;
        if(empty($content)){
          throw new Exception("Error: Missing required arguments: encrypt content");
        }
        if(empty($secret_key) || strlen(trim($secret_key)) < $length){
          throw new Exception("Error: Invalid arguments:encrypt secret key!");
        }
        $secret_key = substr($secret_key,0,$length);
        $content = base64_decode($content);
        $iv = $secret_key;
        $encrypt_content =  mcrypt_decrypt(self::CIPHER, $secret_key, $content, self::MODE, $iv);
        $encrypt_content = trim($encrypt_content);
        return $encrypt_content;

    }
}

?>