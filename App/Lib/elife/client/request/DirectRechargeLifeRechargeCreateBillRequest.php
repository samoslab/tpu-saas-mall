<?php
/**
 * API: qianmi.elife.directRecharge.lifeRecharge.createBill request
 * 
 * @author auto create
 * @since 1.0
 */
class DirectRechargeLifeRechargeCreateBillRequest
{
	private $apiParas = array();

	/** 
	 * 账期(光大使用)
	 */
	private $billCycle;

	/** 
	 * 回调地址
	 */
	private $callback;

	/** 
	 * 城市ID
	 */
	private $cityId;

	/** 
	 * 合同号(光大使用)
	 */
	private $contractNo;

	/** 
	 * 用户地址(水电煤根据户号查询出来)
	 */
	private $customerAddress;

	/** 
	 * 户名(水电煤，根据户号查询出来)
	 */
	private $customerName;

	/** 
	 * 标准商品编号
	 */
	private $itemId;

	/** 
	 * 购买数量
	 */
	private $itemNum;

	/** 
	 * 缴费方式类型(光大使用) 1是条形码 2是户号
	 */
	private $modeType;

	/** 
	 * 外部订单号
	 */
	private $outerTid;

	/** 
	 * 缴费项目ID
	 */
	private $projectId;

	/** 
	 * 省份ID
	 */
	private $provinceId;

	/** 
	 * 充值帐号
	 */
	private $rechargeAccount;

	/** 
	 * 缴费单位ID
	 */
	private $unitId;

	public function setBillCycle($billCycle)
	{
		$this->billCycle = $billCycle;
		$this->apiParas["billCycle"] = $billCycle;
	}
	public function getBillCycle() {
		return $this->billCycle;
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

	public function setContractNo($contractNo)
	{
		$this->contractNo = $contractNo;
		$this->apiParas["contractNo"] = $contractNo;
	}
	public function getContractNo() {
		return $this->contractNo;
	}

	public function setCustomerAddress($customerAddress)
	{
		$this->customerAddress = $customerAddress;
		$this->apiParas["customerAddress"] = $customerAddress;
	}
	public function getCustomerAddress() {
		return $this->customerAddress;
	}

	public function setCustomerName($customerName)
	{
		$this->customerName = $customerName;
		$this->apiParas["customerName"] = $customerName;
	}
	public function getCustomerName() {
		return $this->customerName;
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

	public function setModeType($modeType)
	{
		$this->modeType = $modeType;
		$this->apiParas["modeType"] = $modeType;
	}
	public function getModeType() {
		return $this->modeType;
	}

	public function setOuterTid($outerTid)
	{
		$this->outerTid = $outerTid;
		$this->apiParas["outerTid"] = $outerTid;
	}
	public function getOuterTid() {
		return $this->outerTid;
	}

	public function setProjectId($projectId)
	{
		$this->projectId = $projectId;
		$this->apiParas["projectId"] = $projectId;
	}
	public function getProjectId() {
		return $this->projectId;
	}

	public function setProvinceId($provinceId)
	{
		$this->provinceId = $provinceId;
		$this->apiParas["provinceId"] = $provinceId;
	}
	public function getProvinceId() {
		return $this->provinceId;
	}

	public function setRechargeAccount($rechargeAccount)
	{
		$this->rechargeAccount = $rechargeAccount;
		$this->apiParas["rechargeAccount"] = $rechargeAccount;
	}
	public function getRechargeAccount() {
		return $this->rechargeAccount;
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
		return "qianmi.elife.directRecharge.lifeRecharge.createBill";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->itemId, "itemId");
		RequestCheckUtil::checkNotNull($this->itemNum, "itemNum");
		RequestCheckUtil::checkNotNull($this->rechargeAccount, "rechargeAccount");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
