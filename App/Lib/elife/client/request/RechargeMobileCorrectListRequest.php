<?php
/**
 * API: qianmi.elife.recharge.mobile.correct.list request
 * 
 * @author auto create
 * @since 1.0
 */
class RechargeMobileCorrectListRequest
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
	 * 按冲正订单发起时间排序方式 0-升序 1-降序(默认)
	 */
	private $createdSort;

	/** 
	 * 订单结束时间
	 */
	private $endTime;

	/** 
	 * 冲正手机号码
	 */
	private $mobileNo;

	/** 
	 * 页码,0开始
	 */
	private $pageNo;

	/** 
	 * 返回条数
	 */
	private $pageSize;

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

	public function setCreatedSort($createdSort)
	{
		$this->createdSort = $createdSort;
		$this->apiParas["createdSort"] = $createdSort;
	}
	public function getCreatedSort() {
		return $this->createdSort;
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

	public function setPageNo($pageNo)
	{
		$this->pageNo = $pageNo;
		$this->apiParas["pageNo"] = $pageNo;
	}
	public function getPageNo() {
		return $this->pageNo;
	}

	public function setPageSize($pageSize)
	{
		$this->pageSize = $pageSize;
		$this->apiParas["pageSize"] = $pageSize;
	}
	public function getPageSize() {
		return $this->pageSize;
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
		return "qianmi.elife.recharge.mobile.correct.list";
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
