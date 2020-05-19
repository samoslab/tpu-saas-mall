<?php
/**
 * API: qianmi.elife.coach.startStations.list request
 * 
 * @author auto create
 * @since 1.0
 */
class CoachStartStationsListRequest
{
	private $apiParas = array();

	public function getApiMethodName()
	{
		return "qianmi.elife.coach.startStations.list";
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
