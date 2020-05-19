<?php
/**
 * API: qianmi.elife.recharge.mobile.correct.available.list request
 * 
 * @author auto create
 * @since 1.0
 */
class RechargeMobileCorrectAvailableListRequest
{
	private $apiParas = array();

	/** 
	 * 标准商品编号
	 */
	private $itemId;

	/** 
	 * 标准商品名称
	 */
	private $itemName;

	/** 
	 * 冲正手机号码
	 */
	private $mobileNo;

	public function setItemId($itemId)
	{
		$this->itemId = $itemId;
		$this->apiParas["itemId"] = $itemId;
	}
	public function getItemId() {
		return $this->itemId;
	}

	public function setItemName($itemName)
	{
		$this->itemName = $itemName;
		$this->apiParas["itemName"] = $itemName;
	}
	public function getItemName() {
		return $this->itemName;
	}

	public function setMobileNo($mobileNo)
	{
		$this->mobileNo = $mobileNo;
		$this->apiParas["mobileNo"] = $mobileNo;
	}
	public function getMobileNo() {
		return $this->mobileNo;
	}

	public function getApiMethodName()
	{
		return "qianmi.elife.recharge.mobile.correct.available.list";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->mobileNo, "mobileNo");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
