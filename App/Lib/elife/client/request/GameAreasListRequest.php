<?php
/**
 * API: qianmi.elife.game.areas.list request
 * 
 * @author auto create
 * @since 1.0
 */
class GameAreasListRequest
{
	private $apiParas = array();

	/** 
	 * 商品小类编号
	 */
	private $classId;

	/** 
	 * 标准商品编号
	 */
	private $itemId;

	public function setClassId($classId)
	{
		$this->classId = $classId;
		$this->apiParas["classId"] = $classId;
	}
	public function getClassId() {
		return $this->classId;
	}

	public function setItemId($itemId)
	{
		$this->itemId = $itemId;
		$this->apiParas["itemId"] = $itemId;
	}
	public function getItemId() {
		return $this->itemId;
	}

	public function getApiMethodName()
	{
		return "qianmi.elife.game.areas.list";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->classId, "classId");
		RequestCheckUtil::checkNotNull($this->itemId, "itemId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
