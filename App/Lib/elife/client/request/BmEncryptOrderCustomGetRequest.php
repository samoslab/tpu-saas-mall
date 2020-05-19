<?php
/**
 * API: bm.elife.encrypt.order.custom.get request
 * 
 * @author auto create
 * @since 1.0
 */
class BmEncryptOrderCustomGetRequest
{
	private $apiParas = array();

	/** 
	 * 外部订单编号
	 */
	private $outerTid;

	public function setOuterTid($outerTid)
	{
		$this->outerTid = $outerTid;
		$this->apiParas["outerTid"] = $outerTid;
	}
	public function getOuterTid() {
		return $this->outerTid;
	}

	public function getApiMethodName()
	{
		return "bm.elife.encrypt.order.custom.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->outerTid, "outerTid");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
