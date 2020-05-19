<?php


namespace App\Utility;

use \EasySwoole\HttpClient\HttpClient;

class CoRequestUtil
{

    public function getRequest($url) {
        $client = new HttpClient($url);
        $ret = $client->get();
        return $ret->getBody();
    }

}
