<?php
/**
 * API: qianmi.elife.games.list request
 * 
 * @author auto create
 * @since 1.0
 */
class GamesListRequest
{
	private $apiParas = array();

	public function getApiMethodName()
	{
		return "qianmi.elife.games.list";
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
