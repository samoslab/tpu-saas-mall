<?php
/**
 * API: qianmi.elife.train.order.create request
 * 
 * @author auto create
 * @since 1.0
 */
class TrainOrderCreateRequest
{
	private $apiParas = array();

	/** 
	 * 在线选座坐席
	 */
	private $chooseSeats;

	/** 
	 * 联系人姓名
	 */
	private $contactName;

	/** 
	 * 联系人电话
	 */
	private $contactTel;

	/** 
	 * 出发日期
	 */
	private $date;

	/** 
	 * 起始站中文
	 */
	private $from;

	/** 
	 * 保险商品编号
	 */
	private $itemIdInsur;

	/** 
	 * 火车票商品编号
	 */
	private $itemIdTrain;

	/** 
	 * 乘车人信息
	 */
	private $passagers;

	/** 
	 * 发车时间 eg 00:05
	 */
	private $startTime;

	/** 
	 * 终点站中文
	 */
	private $to;

	/** 
	 * 车次号：如G11
	 */
	private $trainNumber;

	public function setChooseSeats($chooseSeats)
	{
		$this->chooseSeats = $chooseSeats;
		$this->apiParas["chooseSeats"] = $chooseSeats;
	}
	public function getChooseSeats() {
		return $this->chooseSeats;
	}

	public function setContactName($contactName)
	{
		$this->contactName = $contactName;
		$this->apiParas["contactName"] = $contactName;
	}
	public function getContactName() {
		return $this->contactName;
	}

	public function setContactTel($contactTel)
	{
		$this->contactTel = $contactTel;
		$this->apiParas["contactTel"] = $contactTel;
	}
	public function getContactTel() {
		return $this->contactTel;
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

	public function setItemIdInsur($itemIdInsur)
	{
		$this->itemIdInsur = $itemIdInsur;
		$this->apiParas["itemIdInsur"] = $itemIdInsur;
	}
	public function getItemIdInsur() {
		return $this->itemIdInsur;
	}

	public function setItemIdTrain($itemIdTrain)
	{
		$this->itemIdTrain = $itemIdTrain;
		$this->apiParas["itemIdTrain"] = $itemIdTrain;
	}
	public function getItemIdTrain() {
		return $this->itemIdTrain;
	}

	public function setPassagers($passagers)
	{
		$this->passagers = $passagers;
		$this->apiParas["passagers"] = $passagers;
	}
	public function getPassagers() {
		return $this->passagers;
	}

	public function setStartTime($startTime)
	{
		$this->startTime = $startTime;
		$this->apiParas["startTime"] = $startTime;
	}
	public function getStartTime() {
		return $this->startTime;
	}

	public function setTo($to)
	{
		$this->to = $to;
		$this->apiParas["to"] = $to;
	}
	public function getTo() {
		return $this->to;
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
		return "qianmi.elife.train.order.create";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->contactName, "contactName");
		RequestCheckUtil::checkNotNull($this->contactTel, "contactTel");
		RequestCheckUtil::checkNotNull($this->date, "date");
		RequestCheckUtil::checkNotNull($this->from, "from");
		RequestCheckUtil::checkNotNull($this->itemIdTrain, "itemIdTrain");
		RequestCheckUtil::checkNotNull($this->passagers, "passagers");
		RequestCheckUtil::checkNotNull($this->startTime, "startTime");
		RequestCheckUtil::checkNotNull($this->to, "to");
		RequestCheckUtil::checkNotNull($this->trainNumber, "trainNumber");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
