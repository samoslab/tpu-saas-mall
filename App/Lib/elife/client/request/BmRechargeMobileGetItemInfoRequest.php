<?php
/**
 * API: bm.elife.recharge.mobile.getItemInfo request
 * 
 * @author auto create
 * @since 1.0
 */
class BmRechargeMobileGetItemInfoRequest
{
	private $apiParas = array();

	/** 
	 * 手机号码
	 */
	private $mobileNo;

	/** 
	 * 充值面额
	 */
	private $rechargeAmount;

	public function setMobileNo($mobileNo)
	{
		$this->mobileNo = $mobileNo;
		$this->apiParas["mobileNo"] = $mobileNo;
	}
	public function getMobileNo() {
		return $this->mobileNo;
	}

	public function setRechargeAmount($rechargeAmount)
	{
		$this->rechargeAmount = $rechargeAmount;
		$this->apiParas["rechargeAmount"] = $rechargeAmount;
	}
	public function getRechargeAmount() {
		return $this->rechargeAmount;
	}

	public function getApiMethodName()
	{
		return "bm.elife.recharge.mobile.getItemInfo";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->mobileNo, "mobileNo");
		RequestCheckUtil::checkNotNull($this->rechargeAmount, "rechargeAmount");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
