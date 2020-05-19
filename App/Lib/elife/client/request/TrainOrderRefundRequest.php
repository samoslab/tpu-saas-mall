<?php
/**
 * API: qianmi.elife.train.order.refund request
 * 
 * @author auto create
 * @since 1.0
 */
class TrainOrderRefundRequest
{
	private $apiParas = array();

	/** 
	 * 订单子单编号集合
	 */
	private $orderNos;

	public function setOrderNos($orderNos)
	{
		$this->orderNos = $orderNos;
		$this->apiParas["orderNos"] = $orderNos;
	}
	public function getOrderNos() {
		return $this->orderNos;
	}

	public function getApiMethodName()
	{
		return "qianmi.elife.train.order.refund";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->orderNos, "orderNos");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
