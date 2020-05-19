<?php
/**
 * API: qianmi.elife.directRecharge.waterCoal.getAccountInfo request
 * 
 * @author auto create
 * @since 1.0
 */
class DirectRechargeWaterCoalGetAccountInfoRequest
{
	private $apiParas = array();

	/** 
	 * 缴费单标识号（户号或条形码）
	 */
	private $account;

	/** 
	 * 城市名称(后面不带'市')
	 */
	private $city;

	/** 
	 * 城市V编号
	 */
	private $cityId;

	/** 
	 * 标准商品编号，光大与翼支付查询方式必须传入，普通查询无需传入
	 */
	private $itemId;

	/** 
	 * 缴费方式V编号
	 */
	private $modeId;

	/** 
	 * 缴费方式：1是条形码 2是户号, 光大查询需要传入
	 */
	private $modeType;

	/** 
	 * 缴费项目编号
	 */
	private $projectId;

	/** 
	 * 省名称(后面不带'省')
	 */
	private $province;

	/** 
	 * 供货商编号
	 */
	private $supUserId;

	/** 
	 * 缴费单位V编号
	 */
	private $unitId;

	/** 
	 * 缴费单位名称
	 */
	private $unitName;

	public function setAccount($account)
	{
		$this->account = $account;
		$this->apiParas["account"] = $account;
	}
	public function getAccount() {
		return $this->account;
	}

	public function setCity($city)
	{
		$this->city = $city;
		$this->apiParas["city"] = $city;
	}
	public function getCity() {
		return $this->city;
	}

	public function setCityId($cityId)
	{
		$this->cityId = $cityId;
		$this->apiParas["cityId"] = $cityId;
	}
	public function getCityId() {
		return $this->cityId;
	}

	public function setItemId($itemId)
	{
		$this->itemId = $itemId;
		$this->apiParas["itemId"] = $itemId;
	}
	public function getItemId() {
		return $this->itemId;
	}

	public function setModeId($modeId)
	{
		$this->modeId = $modeId;
		$this->apiParas["modeId"] = $modeId;
	}
	public function getModeId() {
		return $this->modeId;
	}

	public function setModeType($modeType)
	{
		$this->modeType = $modeType;
		$this->apiParas["modeType"] = $modeType;
	}
	public function getModeType() {
		return $this->modeType;
	}

	public function setProjectId($projectId)
	{
		$this->projectId = $projectId;
		$this->apiParas["projectId"] = $projectId;
	}
	public function getProjectId() {
		return $this->projectId;
	}

	public function setProvince($province)
	{
		$this->province = $province;
		$this->apiParas["province"] = $province;
	}
	public function getProvince() {
		return $this->province;
	}

	public function setSupUserId($supUserId)
	{
		$this->supUserId = $supUserId;
		$this->apiParas["supUserId"] = $supUserId;
	}
	public function getSupUserId() {
		return $this->supUserId;
	}

	public function setUnitId($unitId)
	{
		$this->unitId = $unitId;
		$this->apiParas["unitId"] = $unitId;
	}
	public function getUnitId() {
		return $this->unitId;
	}

	public function setUnitName($unitName)
	{
		$this->unitName = $unitName;
		$this->apiParas["unitName"] = $unitName;
	}
	public function getUnitName() {
		return $this->unitName;
	}

	public function getApiMethodName()
	{
		return "qianmi.elife.directRecharge.waterCoal.getAccountInfo";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->account, "account");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
