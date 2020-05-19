<?php
/**
 * API: qianmi.elife.recharge.base.getItemInfo request
 * 
 * @author auto create
 * @since 1.0
 */
class RechargeBaseGetItemInfoRequest
{
	private $apiParas = array();

	/** 
	 * 商品ID
	 */
	private $itemId;

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
		return "qianmi.elife.recharge.base.getItemInfo";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->itemId, "itemId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
