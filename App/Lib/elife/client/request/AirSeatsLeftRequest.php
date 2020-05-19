<?php
/**
 * API: qianmi.elife.air.seats.left request
 * 
 * @author auto create
 * @since 1.0
 */
class AirSeatsLeftRequest
{
	private $apiParas = array();

	/** 
	 * 出发日期
	 */
	private $date;

	/** 
	 * 航班号
	 */
	private $flightNo;

	/** 
	 * 出发机场三字码
	 */
	private $from;

	/** 
	 * 飞机票标准商品编号
	 */
	private $itemId;

	/** 
	 * 舱位代码
	 */
	private $seatCode;

	/** 
	 * 抵达机场三字码
	 */
	private $to;

	public function setDate($date)
	{
		$this->date = $date;
		$this->apiParas["date"] = $date;
	}
	public function getDate() {
		return $this->date;
	}

	public function setFlightNo($flightNo)
	{
		$this->flightNo = $flightNo;
		$this->apiParas["flightNo"] = $flightNo;
	}
	public function getFlightNo() {
		return $this->flightNo;
	}

	public function setFrom($from)
	{
		$this->from = $from;
		$this->apiParas["from"] = $from;
	}
	public function getFrom() {
		return $this->from;
	}

	public function setItemId($itemId)
	{
		$this->itemId = $itemId;
		$this->apiParas["itemId"] = $itemId;
	}
	public function getItemId() {
		return $this->itemId;
	}

	public function setSeatCode($seatCode)
	{
		$this->seatCode = $seatCode;
		$this->apiParas["seatCode"] = $seatCode;
	}
	public function getSeatCode() {
		return $this->seatCode;
	}

	public function setTo($to)
	{
		$this->to = $to;
		$this->apiParas["to"] = $to;
	}
	public function getTo() {
		return $this->to;
	}

	public function getApiMethodName()
	{
		return "qianmi.elife.air.seats.left";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->date, "date");
		RequestCheckUtil::checkNotNull($this->flightNo, "flightNo");
		RequestCheckUtil::checkNotNull($this->from, "from");
		RequestCheckUtil::checkNotNull($this->seatCode, "seatCode");
		RequestCheckUtil::checkNotNull($this->to, "to");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
