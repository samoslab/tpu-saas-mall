<?php
/**
 * API: qianmi.elife.trafficFine.getTrafficFineInfo request
 * 
 * @author auto create
 * @since 1.0
 */
class TrafficFineGetTrafficFineInfoRequest
{
	private $apiParas = array();

	/** 
	 * 车牌号码
	 */
	private $carNo;

	/** 
	 * 车辆类型
	 */
	private $carType;

	/** 
	 * 城市中文
	 */
	private $city;

	/** 
	 * 发动机号
	 */
	private $engineId;

	/** 
	 * 车架号
	 */
	private $frameId;

	/** 
	 * 省份中文
	 */
	private $province;

	public function setCarNo($carNo)
	{
		$this->carNo = $carNo;
		$this->apiParas["carNo"] = $carNo;
	}
	public function getCarNo() {
		return $this->carNo;
	}

	public function setCarType($carType)
	{
		$this->carType = $carType;
		$this->apiParas["carType"] = $carType;
	}
	public function getCarType() {
		return $this->carType;
	}

	public function setCity($city)
	{
		$this->city = $city;
		$this->apiParas["city"] = $city;
	}
	public function getCity() {
		return $this->city;
	}

	public function setEngineId($engineId)
	{
		$this->engineId = $engineId;
		$this->apiParas["engineId"] = $engineId;
	}
	public function getEngineId() {
		return $this->engineId;
	}

	public function setFrameId($frameId)
	{
		$this->frameId = $frameId;
		$this->apiParas["frameId"] = $frameId;
	}
	public function getFrameId() {
		return $this->frameId;
	}

	public function setProvince($province)
	{
		$this->province = $province;
		$this->apiParas["province"] = $province;
	}
	public function getProvince() {
		return $this->province;
	}

	public function getApiMethodName()
	{
		return "qianmi.elife.trafficFine.getTrafficFineInfo";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->carNo, "carNo");
		RequestCheckUtil::checkNotNull($this->carType, "carType");
		RequestCheckUtil::checkNotNull($this->city, "city");
		RequestCheckUtil::checkNotNull($this->engineId, "engineId");
		RequestCheckUtil::checkNotNull($this->province, "province");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
