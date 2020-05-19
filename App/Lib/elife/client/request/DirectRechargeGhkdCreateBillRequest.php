<?php
/**
 * API: qianmi.elife.directRecharge.ghkd.createBill request
 * 
 * @author auto create
 * @since 1.0
 */
class DirectRechargeGhkdCreateBillRequest
{
	private $apiParas = array();

	/** 
	 * 充值帐号
	 */
	private $account;

	/** 
	 * 回调地址
	 */
	private $callback;

	/** 
	 * 城市编号
	 */
	private $cityId;

	/** 
	 * 充值金额编号(面值)
	 */
	private $faceValueId;

	/** 
	 * 标准商品编号
	 */
	private $itemId;

	/** 
	 * 购买数量(默认为1)
	 */
	private $itemNum;

	/** 
	 * 固话宽带充值缴费方式编号 （月租费，账号）
	 */
	private $modeId;

	/** 
	 * 外部订单号
	 */
	private $outerTid;

	/** 
	 * 省份编号
	 */
	private $provinceId;

	/** 
	 * 固话宽带充值类型编号 （固话，宽带，综合）
	 */
	private $typeId;

	/** 
	 * 固话宽带充值类型名称 （固话，宽带，综合）
	 */
	private $typeName;

	/** 
	 * 缴费单位编号
	 */
	private $unitId;

	public function setAccount($account)
	{
		$this->account = $account;
		$this->apiParas["account"] = $account;
	}
	public function getAccount() {
		return $this->account;
	}

	public function setCallback($callback)
	{
		$this->callback = $callback;
		$this->apiParas["callback"] = $callback;
	}
	public function getCallback() {
		return $this->callback;
	}

	public function setCityId($cityId)
	{
		$this->cityId = $cityId;
		$this->apiParas["cityId"] = $cityId;
	}
	public function getCityId() {
		return $this->cityId;
	}

	public function setFaceValueId($faceValueId)
	{
		$this->faceValueId = $faceValueId;
		$this->apiParas["faceValueId"] = $faceValueId;
	}
	public function getFaceValueId() {
		return $this->faceValueId;
	}

	public function setItemId($itemId)
	{
		$this->itemId = $itemId;
		$this->apiParas["itemId"] = $itemId;
	}
	public function getItemId() {
		return $this->itemId;
	}

	public function setItemNum($itemNum)
	{
		$this->itemNum = $itemNum;
		$this->apiParas["itemNum"] = $itemNum;
	}
	public function getItemNum() {
		return $this->itemNum;
	}

	public function setModeId($modeId)
	{
		$this->modeId = $modeId;
		$this->apiParas["modeId"] = $modeId;
	}
	public function getModeId() {
		return $this->modeId;
	}

	public function setOuterTid($outerTid)
	{
		$this->outerTid = $outerTid;
		$this->apiParas["outerTid"] = $outerTid;
	}
	public function getOuterTid() {
		return $this->outerTid;
	}

	public function setProvinceId($provinceId)
	{
		$this->provinceId = $provinceId;
		$this->apiParas["provinceId"] = $provinceId;
	}
	public function getProvinceId() {
		return $this->provinceId;
	}

	public function setTypeId($typeId)
	{
		$this->typeId = $typeId;
		$this->apiParas["typeId"] = $typeId;
	}
	public function getTypeId() {
		return $this->typeId;
	}

	public function setTypeName($typeName)
	{
		$this->typeName = $typeName;
		$this->apiParas["typeName"] = $typeName;
	}
	public function getTypeName() {
		return $this->typeName;
	}

	public function setUnitId($unitId)
	{
		$this->unitId = $unitId;
		$this->apiParas["unitId"] = $unitId;
	}
	public function getUnitId() {
		return $this->unitId;
	}

	public function getApiMethodName()
	{
		return "qianmi.elife.directRecharge.ghkd.createBill";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->account, "account");
		RequestCheckUtil::checkNotNull($this->itemId, "itemId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
