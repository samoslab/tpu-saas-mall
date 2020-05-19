<?php
/**
 * API: qianmi.elife.coach.createBill request
 * 
 * @author auto create
 * @since 1.0
 */
class CoachCreateBillRequest
{
	private $apiParas = array();

	/** 
	 * 到达站
	 */
	private $arrStation;

	/** 
	 * 汽车票车次
	 */
	private $coachNO;

	/** 
	 * 取票人姓名
	 */
	private $contactName;

	/** 
	 * 取票人联系电话
	 */
	private $contactTel;

	/** 
	 * 出发城市
	 */
	private $departure;

	/** 
	 * 到达城市
	 */
	private $destination;

	/** 
	 * 出发时间
	 */
	private $dptDateTime;

	/** 
	 * 出发站
	 */
	private $dptStation;

	/** 
	 * 取票人二代身份证号
	 */
	private $idnumber;

	/** 
	 * 汽车票商品编号
	 */
	private $itemIdCoach;

	/** 
	 * 保险商品编号
	 */
	private $itemIdInsur;

	/** 
	 * 乘客信息,以英文逗号分隔,依次为：乘客姓名,乘客证件号码,多个乘客时以英文分号分隔，同一笔订单最多支持五个乘客
	 */
	private $passagers;

	/** 
	 * 票面价
	 */
	private $seatPrice;

	/** 
	 * 汽车站点编号，查询车次接口返回
	 */
	private $stationCode;

	public function setArrStation($arrStation)
	{
		$this->arrStation = $arrStation;
		$this->apiParas["arrStation"] = $arrStation;
	}
	public function getArrStation() {
		return $this->arrStation;
	}

	public function setCoachNO($coachNO)
	{
		$this->coachNO = $coachNO;
		$this->apiParas["coachNO"] = $coachNO;
	}
	public function getCoachNO() {
		return $this->coachNO;
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

	public function setDeparture($departure)
	{
		$this->departure = $departure;
		$this->apiParas["departure"] = $departure;
	}
	public function getDeparture() {
		return $this->departure;
	}

	public function setDestination($destination)
	{
		$this->destination = $destination;
		$this->apiParas["destination"] = $destination;
	}
	public function getDestination() {
		return $this->destination;
	}

	public function setDptDateTime($dptDateTime)
	{
		$this->dptDateTime = $dptDateTime;
		$this->apiParas["dptDateTime"] = $dptDateTime;
	}
	public function getDptDateTime() {
		return $this->dptDateTime;
	}

	public function setDptStation($dptStation)
	{
		$this->dptStation = $dptStation;
		$this->apiParas["dptStation"] = $dptStation;
	}
	public function getDptStation() {
		return $this->dptStation;
	}

	public function setIdnumber($idnumber)
	{
		$this->idnumber = $idnumber;
		$this->apiParas["idnumber"] = $idnumber;
	}
	public function getIdnumber() {
		return $this->idnumber;
	}

	public function setItemIdCoach($itemIdCoach)
	{
		$this->itemIdCoach = $itemIdCoach;
		$this->apiParas["itemIdCoach"] = $itemIdCoach;
	}
	public function getItemIdCoach() {
		return $this->itemIdCoach;
	}

	public function setItemIdInsur($itemIdInsur)
	{
		$this->itemIdInsur = $itemIdInsur;
		$this->apiParas["itemIdInsur"] = $itemIdInsur;
	}
	public function getItemIdInsur() {
		return $this->itemIdInsur;
	}

	public function setPassagers($passagers)
	{
		$this->passagers = $passagers;
		$this->apiParas["passagers"] = $passagers;
	}
	public function getPassagers() {
		return $this->passagers;
	}

	public function setSeatPrice($seatPrice)
	{
		$this->seatPrice = $seatPrice;
		$this->apiParas["seatPrice"] = $seatPrice;
	}
	public function getSeatPrice() {
		return $this->seatPrice;
	}

	public function setStationCode($stationCode)
	{
		$this->stationCode = $stationCode;
		$this->apiParas["stationCode"] = $stationCode;
	}
	public function getStationCode() {
		return $this->stationCode;
	}

	public function getApiMethodName()
	{
		return "qianmi.elife.coach.createBill";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->arrStation, "arrStation");
		RequestCheckUtil::checkNotNull($this->coachNO, "coachNO");
		RequestCheckUtil::checkNotNull($this->contactName, "contactName");
		RequestCheckUtil::checkNotNull($this->contactTel, "contactTel");
		RequestCheckUtil::checkNotNull($this->departure, "departure");
		RequestCheckUtil::checkNotNull($this->destination, "destination");
		RequestCheckUtil::checkNotNull($this->dptDateTime, "dptDateTime");
		RequestCheckUtil::checkNotNull($this->dptStation, "dptStation");
		RequestCheckUtil::checkNotNull($this->idnumber, "idnumber");
		RequestCheckUtil::checkNotNull($this->itemIdCoach, "itemIdCoach");
		RequestCheckUtil::checkNotNull($this->passagers, "passagers");
		RequestCheckUtil::checkNotNull($this->stationCode, "stationCode");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
