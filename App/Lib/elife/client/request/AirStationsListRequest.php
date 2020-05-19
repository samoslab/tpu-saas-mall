<?php
/**
 * API: qianmi.elife.air.stations.list request
 * 
 * @author auto create
 * @since 1.0
 */
class AirStationsListRequest
{
	private $apiParas = array();

	public function getApiMethodName()
	{
		return "qianmi.elife.air.stations.list";
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
