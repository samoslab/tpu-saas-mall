<?php
/**
 * API: qianmi.elife.air.order.refund request
 * 
 * @author auto create
 * @since 1.0
 */
class AirOrderRefundRequest
{
	private $apiParas = array();

	/** 
	 * 订单子单编号集合
	 */
	private $orderNos;

	/** 
	 * 飞机票退票类型:1-退废票,3-退票
	 */
	private $returnType;

	/** 
	 * 订单主单号
	 */
	private $tradeNo;

	public function setOrderNos($orderNos)
	{
		$this->orderNos = $orderNos;
		$this->apiParas["orderNos"] = $orderNos;
	}
	public function getOrderNos() {
		return $this->orderNos;
	}

	public function setReturnType($returnType)
	{
		$this->returnType = $returnType;
		$this->apiParas["returnType"] = $returnType;
	}
	public function getReturnType() {
		return $this->returnType;
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
		return "qianmi.elife.air.order.refund";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->orderNos, "orderNos");
		RequestCheckUtil::checkNotNull($this->returnType, "returnType");
		RequestCheckUtil::checkNotNull($this->tradeNo, "tradeNo");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
