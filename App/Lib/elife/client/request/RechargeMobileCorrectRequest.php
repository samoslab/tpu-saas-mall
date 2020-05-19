<?php
/**
 * API: qianmi.elife.recharge.mobile.correct request
 * 
 * @author auto create
 * @since 1.0
 */
class RechargeMobileCorrectRequest
{
	private $apiParas = array();

	/** 
	 * 订单编号
	 */
	private $billId;

	public function setBillId($billId)
	{
		$this->billId = $billId;
		$this->apiParas["billId"] = $billId;
	}
	public function getBillId() {
		return $this->billId;
	}

	public function getApiMethodName()
	{
		return "qianmi.elife.recharge.mobile.correct";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->billId, "billId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
