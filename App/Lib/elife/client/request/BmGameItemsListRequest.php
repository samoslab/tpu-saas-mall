<?php
/**
 * API: bm.elife.game.items.list request
 * 
 * @author auto create
 * @since 1.0
 */
class BmGameItemsListRequest
{
	private $apiParas = array();

	/** 
	 * 游戏小类编号
	 */
	private $classId;

	public function setClassId($classId)
	{
		$this->classId = $classId;
		$this->apiParas["classId"] = $classId;
	}
	public function getClassId() {
		return $this->classId;
	}

	public function getApiMethodName()
	{
		return "bm.elife.game.items.list";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->classId, "classId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
