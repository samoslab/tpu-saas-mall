<?php
/**
 * API: qianmi.elife.coach.orders.list request
 * 
 * @author auto create
 * @since 1.0
 */
class CoachOrdersListRequest
{
	private $apiParas = array();

	/** 
	 * 订单结束时间
	 */
	private $endTime;

	/** 
	 * 订单状态, 0:预定中, 1:待支付, 2:已取消, 3:出票中, 4:已出票, 5:出票失败
	 */
	private $orderStatus;

	/** 
	 * 订单类型 1:火车票  2:飞机票  3:汽车票
	 */
	private $orderType;

	/** 
	 * 当前页码 从0开始
	 */
	private $pageNo;

	/** 
	 * 每页显示条数
	 */
	private $pageSize;

	/** 
	 * 按订单生成时间排序标志,默认降序 格式: asc-升序/desc-降序
	 */
	private $sort;

	/** 
	 * 订单开始时间
	 */
	private $startTime;

	/** 
	 * 供货商编号
	 */
	private $supUserId;

	/** 
	 * 订单主单号
	 */
	private $tradeNo;

	public function setEndTime($endTime)
	{
		$this->endTime = $endTime;
		$this->apiParas["endTime"] = $endTime;
	}
	public function getEndTime() {
		return $this->endTime;
	}

	public function setOrderStatus($orderStatus)
	{
		$this->orderStatus = $orderStatus;
		$this->apiParas["orderStatus"] = $orderStatus;
	}
	public function getOrderStatus() {
		return $this->orderStatus;
	}

	public function setOrderType($orderType)
	{
		$this->orderType = $orderType;
		$this->apiParas["orderType"] = $orderType;
	}
	public function getOrderType() {
		return $this->orderType;
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

	public function setSort($sort)
	{
		$this->sort = $sort;
		$this->apiParas["sort"] = $sort;
	}
	public function getSort() {
		return $this->sort;
	}

	public function setStartTime($startTime)
	{
		$this->startTime = $startTime;
		$this->apiParas["startTime"] = $startTime;
	}
	public function getStartTime() {
		return $this->startTime;
	}

	public function setSupUserId($supUserId)
	{
		$this->supUserId = $supUserId;
		$this->apiParas["supUserId"] = $supUserId;
	}
	public function getSupUserId() {
		return $this->supUserId;
	}

	public function setTradeNo($tradeNo)
	{
		$this->tradeNo = $tradeNo;
		$this->apiParas["tradeNo"] = $tradeNo;
	}
	public function getTradeNo() {
		return $this->tradeNo;
	}

	public function getApiMethodName()
	{
		return "qianmi.elife.coach.orders.list";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->endTime, "endTime");
		RequestCheckUtil::checkNotNull($this->startTime, "startTime");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
