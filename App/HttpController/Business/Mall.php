<?php


namespace App\HttpController\Business;


use App\Bean\Mall\MallCateogryBean;
use App\Logic\MallService;

class Mall extends BizAuth
{


    public function upsertCategory()
    {
        $app = $this->getApp();
        $bean = new MallCateogryBean($$this->getForm());
        $bean->app = $app;
        $bean->creator = $this->getUid();
        $ret = MallService::getInstance()->upsertCategory($bean);
        $this->writeRet($ret);


    }

    /**
     * 商品在特定的分类下面
     */
    public function upsertGoods()
    {
        $app = $this->getApp();

    }

}