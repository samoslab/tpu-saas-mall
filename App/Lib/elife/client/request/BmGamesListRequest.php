<?php
/**
 * API: bm.elife.games.list request
 * 
 * @author auto create
 * @since 1.0
 */
class BmGamesListRequest
{
	private $apiParas = array();

	public function getApiMethodName()
	{
		return "bm.elife.games.list";
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
