<?php
/**
 * API: bm.elife.encrypt.recharge.mobile.payBill request
 * 
 * @author auto create
 * @since 1.0
 */
class BmEncryptRechargeMobilePayBillRequest
{
	private $apiParas = array();

	/** 
	 * 加密后的请求串
	 */
	private $param;

	public function setParam($param)
	{
		$this->param = $param;
		$this->apiParas["param"] = $param;
	}
	public function getParam() {
		return $this->param;
	}

	public function getApiMethodName()
	{
		return "bm.elife.encrypt.recharge.mobile.payBill";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
