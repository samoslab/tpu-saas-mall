<?php
/**
 * API: qianmi.elife.finance.getAcctInfo request
 * 
 * @author auto create
 * @since 1.0
 */
class FinanceGetAcctInfoRequest
{
	private $apiParas = array();

	public function getApiMethodName()
	{
		return "qianmi.elife.finance.getAcctInfo";
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
