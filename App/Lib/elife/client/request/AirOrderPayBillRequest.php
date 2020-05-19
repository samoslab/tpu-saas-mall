<?php
/**
 * API: qianmi.elife.air.order.payBill request
 * 
 * @author auto create
 * @since 1.0
 */
class AirOrderPayBillRequest
{
	private $apiParas = array();

	/** 
	 * 航空公司三字碼
	 */
	private $companyCode;

	/** 
	 * 订票联系人
	 */
	private $contactName;

	/** 
	 * 联系电话
	 */
	private $contactTel;

	/** 
	 * 出发日期
	 */
	private $date;

	/** 
	 * 航班编号
	 */
	private $flightNo;

	/** 
	 * 出发站点三字码
	 */
	private $from;

	/** 
	 * 飞机票商品编号
	 */
	private $itemId;

	/** 
	 * 乘客信息
	 */
	private $passagers;

	/** 
	 * 舱位编码
	 */
	private $seatCode;

	/** 
	 * 抵达站点三字码
	 */
	private $to;

	public function setCompanyCode($companyCode)
	{
		$this->companyCode = $companyCode;
		$this->apiParas["companyCode"] = $companyCode;
	}
	public function getCompanyCode() {
		return $this->companyCode;
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

	public function setPassagers($passagers)
	{
		$this->passagers = $passagers;
		$this->apiParas["passagers"] = $passagers;
	}
	public function getPassagers() {
		return $this->passagers;
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
		return "qianmi.elife.air.order.payBill";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->companyCode, "companyCode");
		RequestCheckUtil::checkNotNull($this->contactName, "contactName");
		RequestCheckUtil::checkNotNull($this->contactTel, "contactTel");
		RequestCheckUtil::checkNotNull($this->date, "date");
		RequestCheckUtil::checkNotNull($this->flightNo, "flightNo");
		RequestCheckUtil::checkNotNull($this->from, "from");
		RequestCheckUtil::checkNotNull($this->itemId, "itemId");
		RequestCheckUtil::checkNotNull($this->seatCode, "seatCode");
		RequestCheckUtil::checkNotNull($this->to, "to");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
