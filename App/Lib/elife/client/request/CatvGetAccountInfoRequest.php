<?php
/**
 * API: qianmi.elife.catv.getAccountInfo request
 * 
 * @author auto create
 * @since 1.0
 */
class CatvGetAccountInfoRequest
{
	private $apiParas = array();

	/** 
	 * 缴费账号或户号，卡号
	 */
	private $account;

	/** 
	 * 标准商品编号
	 */
	private $itemId;

	public function setAccount($account)
	{
		$this->account = $account;
		$this->apiParas["account"] = $account;
	}
	public function getAccount() {
		return $this->account;
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
		return "qianmi.elife.catv.getAccountInfo";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->account, "account");
		RequestCheckUtil::checkNotNull($this->itemId, "itemId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
