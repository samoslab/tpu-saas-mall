<?php
/**
 * API: qianmi.elife.logistics.codes.get request
 * 
 * @author auto create
 * @since 1.0
 */
class LogisticsCodesGetRequest
{
	private $apiParas = array();

	public function getApiMethodName()
	{
		return "qianmi.elife.logistics.codes.get";
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
