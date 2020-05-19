<?php
/**
 * API: qianmi.tools.time.get request
 * 
 * @author auto create
 * @since 1.0
 */
class ToolsTimeGetRequest
{
	private $apiParas = array();

	public function getApiMethodName()
	{
		return "qianmi.tools.time.get";
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
