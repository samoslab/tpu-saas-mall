<?php
/**
 * API: qianmi.elife.coach.lines.list request
 * 
 * @author auto create
 * @since 1.0
 */
class CoachLinesListRequest
{
	private $apiParas = array();

	/** 
	 * 出发日期 格式 yyyy-MM-dd
	 */
	private $date;

	/** 
	 * 起始站中文名称
	 */
	private $from;

	/** 
	 * 到达站中文名称
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

	public function setFrom($from)
	{
		$this->from = $from;
		$this->apiParas["from"] = $from;
	}
	public function getFrom() {
		return $this->from;
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
		return "qianmi.elife.coach.lines.list";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->date, "date");
		RequestCheckUtil::checkNotNull($this->from, "from");
		RequestCheckUtil::checkNotNull($this->to, "to");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
