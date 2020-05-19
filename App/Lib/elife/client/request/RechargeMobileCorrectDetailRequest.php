<?php
/**
 * API: qianmi.elife.recharge.mobile.correct.detail request
 * 
 * @author auto create
 * @since 1.0
 */
class RechargeMobileCorrectDetailRequest
{
	private $apiParas = array();

	/** 
	 * 关联订单编号
	 */
	private $billId;

	/** 
	 * 冲正状态 1-待冲正 4-冲正失败 5-冲正成功
	 */
	private $correctStatus;

	/** 
	 * 订单结束时间
	 */
	private $endTime;

	/** 
	 * 冲正手机号码
	 */
	private $mobileNo;

	/** 
	 * 订单开始时间
	 */
	private $startTime;

	public function setBillId($billId)
	{
		$this->billId = $billId;
		$this->apiParas["billId"] = $billId;
	}
	public function getBillId() {
		return $this->billId;
	}

	public function setCorrectStatus($correctStatus)
	{
		$this->correctStatus = $correctStatus;
		$this->apiParas["correctStatus"] = $correctStatus;
	}
	public function getCorrectStatus() {
		return $this->correctStatus;
	}

	public function setEndTime($endTime)
	{
		$this->endTime = $endTime;
		$this->apiParas["endTime"] = $endTime;
	}
	public function getEndTime() {
		return $this->endTime;
	}

	public function setMobileNo($mobileNo)
	{
		$this->mobileNo = $mobileNo;
		$this->apiParas["mobileNo"] = $mobileNo;
	}
	public function getMobileNo() {
		return $this->mobileNo;
	}

	public function setStartTime($startTime)
	{
		$this->startTime = $startTime;
		$this->apiParas["startTime"] = $startTime;
	}
	public function getStartTime() {
		return $this->startTime;
	}

	public function getApiMethodName()
	{
		return "qianmi.elife.recharge.mobile.correct.detail";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->billId, "billId");
		RequestCheckUtil::checkNotNull($this->mobileNo, "mobileNo");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
