<?php


namespace App\Logic;

use App\Bean\Mall\MallCateogryBean;
use App\Model\Mall\CategoryModel;
use EasySwoole\Component\Singleton;

/**
 * Class MallService
 * @package App\Logic
 * 商城业务逻辑
 */
class MallService extends BaseService
{
    use Singleton;

    //TODO：
    //分类
    public function upsertCategory(MallCateogryBean $bean) {
        if(!empty($bean->cid)) {
           return $this->updateCateogry($bean);
        } else {
            return $this->addCategory($bean);
        }
    }

    public  function updateCategory(MallCateogryBean $bean) {

        $flag = CategoryModel::create()->update($bean->toArray(),['cid'=>$bean->cid,'app'=>$bean->app]);
        if($flag) {
            return $this->setRet(0,'succ');
        } else {
            return $this->setRet(1,'fail');
        }
    }

    public function addCategory(MallCateogryBean $bean) {
        $data = $bean->toArray();

        if(!empty($data['pid'])) {
            $o = CategoryModel::create()->get(['app'=>$bean->app,'cid'=>$data['pid']])->field('cid');
            if(!$o) {
                track_error("pid 无效");
                return $this->setRet(1,'fail','pid fail');
            }
        }

        $cid = CategoryModel::create($data)->save();
        if($cid) {
            track_info("succ:".json_encode($data));
            return $this->setRet(0,'succ',['cid'=>$cid]);
        } else {
            return $this->setRet(1,'fail',['cid'=>0]);
        }
    }






}