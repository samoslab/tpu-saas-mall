<?php
/**
 * API: qianmi.elife.air.lines.list request
 * 
 * @author auto create
 * @since 1.0
 */
class AirLinesListRequest
{
	private $apiParas = array();

	/** 
	 * 航空公司列表，以|分割
	 */
	private $companys;

	/** 
	 * 起飞日期
	 */
	private $date;

	/** 
	 * 起飞机场编号
	 */
	private $from;

	/** 
	 * 标准商品编号
	 */
	private $itemId;

	/** 
	 * 舱位类型列表，以|分割
	 */
	private $seatTypes;

	/** 
	 * 时间段列表，时间段以|分割
	 */
	private $timePeriods;

	/** 
	 * 目的地机场编号
	 */
	private $to;

	public function setCompanys($companys)
	{
		$this->companys = $companys;
		$this->apiParas["companys"] = $companys;
	}
	public function getCompanys() {
		return $this->companys;
	}

	public function setDate($date)
	{
		$this->date = $date;
		$this->apiParas["date"] = $date;
	}
	public function getDate() {
		return $this->date;
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

	public function setSeatTypes($seatTypes)
	{
		$this->seatTypes = $seatTypes;
		$this->apiParas["seat_types"] = $seatTypes;
	}
	public function getSeatTypes() {
		return $this->seatTypes;
	}

	public function setTimePeriods($timePeriods)
	{
		$this->timePeriods = $timePeriods;
		$this->apiParas["time_periods"] = $timePeriods;
	}
	public function getTimePeriods() {
		return $this->timePeriods;
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
		return "qianmi.elife.air.lines.list";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->date, "date");
		RequestCheckUtil::checkNotNull($this->from, "from");
		RequestCheckUtil::checkNotNull($this->itemId, "itemId");
		RequestCheckUtil::checkNotNull($this->to, "to");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
