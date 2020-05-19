<?php
/**
 * API: qianmi.elife.train.lines.list request
 * 
 * @author auto create
 * @since 1.0
 */
class TrainLinesListRequest
{
	private $apiParas = array();

	/** 
	 * 出发日期
	 */
	private $date;

	/** 
	 * 起始站中文
	 */
	private $from;

	/** 
	 * 终点站中文
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
		return "qianmi.elife.train.lines.list";
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
