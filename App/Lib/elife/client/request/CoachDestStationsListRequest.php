<?php
/**
 * API: qianmi.elife.coach.destStations.list request
 * 
 * @author auto create
 * @since 1.0
 */
class CoachDestStationsListRequest
{
	private $apiParas = array();

	/** 
	 * 起始站中文
	 */
	private $startStation;

	public function setStartStation($startStation)
	{
		$this->startStation = $startStation;
		$this->apiParas["startStation"] = $startStation;
	}
	public function getStartStation() {
		return $this->startStation;
	}

	public function getApiMethodName()
	{
		return "qianmi.elife.coach.destStations.list";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->startStation, "startStation");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
