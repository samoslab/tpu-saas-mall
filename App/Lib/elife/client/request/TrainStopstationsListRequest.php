<?php
/**
 * API: qianmi.elife.train.stopstations.list request
 * 
 * @author auto create
 * @since 1.0
 */
class TrainStopstationsListRequest
{
	private $apiParas = array();

	/** 
	 * 查询日期
	 */
	private $date;

	/** 
	 * 车次号：如G11
	 */
	private $trainNumber;

	public function setDate($date)
	{
		$this->date = $date;
		$this->apiParas["date"] = $date;
	}
	public function getDate() {
		return $this->date;
	}

	public function setTrainNumber($trainNumber)
	{
		$this->trainNumber = $trainNumber;
		$this->apiParas["trainNumber"] = $trainNumber;
	}
	public function getTrainNumber() {
		return $this->trainNumber;
	}

	public function getApiMethodName()
	{
		return "qianmi.elife.train.stopstations.list";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->date, "date");
		RequestCheckUtil::checkNotNull($this->trainNumber, "trainNumber");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
