<?php
/**
 * API: bm.elife.recharge.order.list request
 * 
 * @author auto create
 * @since 1.0
 */
class BmRechargeOrderListRequest
{
	private $apiParas = array();

	/** 
	 * 订单状态  1 成功 2 充值中 3 已撤销 4 未付款
	 */
	private $orderState;

	/** 
	 * 订单时间
	 */
	private $orderTime;

	/** 
	 * 页码
	 */
	private $pageNo;

	/** 
	 * 行号
	 */
	private $pageSize;

	/** 
	 * 充值帐号
	 */
	private $rechargeAccount;

	public function setOrderState($orderState)
	{
		$this->orderState = $orderState;
		$this->apiParas["orderState"] = $orderState;
	}
	public function getOrderState() {
		return $this->orderState;
	}

	public function setOrderTime($orderTime)
	{
		$this->orderTime = $orderTime;
		$this->apiParas["orderTime"] = $orderTime;
	}
	public function getOrderTime() {
		return $this->orderTime;
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

	public function setRechargeAccount($rechargeAccount)
	{
		$this->rechargeAccount = $rechargeAccount;
		$this->apiParas["rechargeAccount"] = $rechargeAccount;
	}
	public function getRechargeAccount() {
		return $this->rechargeAccount;
	}

	public function getApiMethodName()
	{
		return "bm.elife.recharge.order.list";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->orderTime, "orderTime");
		RequestCheckUtil::checkNotNull($this->pageNo, "pageNo");
		RequestCheckUtil::checkNotNull($this->pageSize, "pageSize");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
