<?php
/**
 * API: bm.elife.recharge.mobile.payBill request
 * 
 * @author auto create
 * @since 1.0
 */
class BmRechargeMobilePayBillRequest
{
	private $apiParas = array();

	/** 
	 * 回调地址
	 */
	private $callback;

	/** 
	 * 标准商品编号
	 */
	private $itemId;

	/** 
	 * 手机号码
	 */
	private $mobileNo;

	/** 
	 * 外部订单号
	 */
	private $outerTid;

	/** 
	 * 充值面额
	 */
	private $rechargeAmount;

	public function setCallback($callback)
	{
		$this->callback = $callback;
		$this->apiParas["callback"] = $callback;
	}
	public function getCallback() {
		return $this->callback;
	}

	public function setItemId($itemId)
	{
		$this->itemId = $itemId;
		$this->apiParas["itemId"] = $itemId;
	}
	public function getItemId() {
		return $this->itemId;
	}

	public function setMobileNo($mobileNo)
	{
		$this->mobileNo = $mobileNo;
		$this->apiParas["mobileNo"] = $mobileNo;
	}
	public function getMobileNo() {
		return $this->mobileNo;
	}

	public function setOuterTid($outerTid)
	{
		$this->outerTid = $outerTid;
		$this->apiParas["outerTid"] = $outerTid;
	}
	public function getOuterTid() {
		return $this->outerTid;
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
		return "bm.elife.recharge.mobile.payBill";
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
