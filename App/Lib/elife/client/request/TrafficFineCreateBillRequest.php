<?php
/**
 * API: qianmi.elife.trafficFine.createBill request
 * 
 * @author auto create
 * @since 1.0
 */
class TrafficFineCreateBillRequest
{
	private $apiParas = array();

	/** 
	 * 回调地址
	 */
	private $callback;

	/** 
	 * 车牌号码
	 */
	private $carNo;

	/** 
	 * 车主姓名
	 */
	private $carOwnerName;

	/** 
	 * 手机号
	 */
	private $carOwnerTel;

	/** 
	 * 车辆类型
	 */
	private $carType;

	/** 
	 * 验证码
	 */
	private $checkCode;

	/** 
	 * 滞纳金
	 */
	private $delayFee;

	/** 
	 * 发动机号
	 */
	private $engineId;

	/** 
	 * 罚金
	 */
	private $fineFee;

	/** 
	 * 罚单编号
	 */
	private $fineNo;

	/** 
	 * 处罚时间
	 */
	private $fineTime;

	/** 
	 * 罚款单号
	 */
	private $fineUnique;

	/** 
	 * 车架号
	 */
	private $frameId;

	/** 
	 * 标准商品编号
	 */
	private $itemId;

	/** 
	 * 外部订单号
	 */
	private $outerTid;

	/** 
	 * 项目单号
	 */
	private $projectNum;

	/** 
	 * 代办费
	 */
	private $proxyFee;

	/** 
	 * 总金额
	 */
	private $totalAmount;

	/** 
	 * 主键
	 */
	private $unique;

	public function setCallback($callback)
	{
		$this->callback = $callback;
		$this->apiParas["callback"] = $callback;
	}
	public function getCallback() {
		return $this->callback;
	}

	public function setCarNo($carNo)
	{
		$this->carNo = $carNo;
		$this->apiParas["carNo"] = $carNo;
	}
	public function getCarNo() {
		return $this->carNo;
	}

	public function setCarOwnerName($carOwnerName)
	{
		$this->carOwnerName = $carOwnerName;
		$this->apiParas["carOwnerName"] = $carOwnerName;
	}
	public function getCarOwnerName() {
		return $this->carOwnerName;
	}

	public function setCarOwnerTel($carOwnerTel)
	{
		$this->carOwnerTel = $carOwnerTel;
		$this->apiParas["carOwnerTel"] = $carOwnerTel;
	}
	public function getCarOwnerTel() {
		return $this->carOwnerTel;
	}

	public function setCarType($carType)
	{
		$this->carType = $carType;
		$this->apiParas["carType"] = $carType;
	}
	public function getCarType() {
		return $this->carType;
	}

	public function setCheckCode($checkCode)
	{
		$this->checkCode = $checkCode;
		$this->apiParas["checkCode"] = $checkCode;
	}
	public function getCheckCode() {
		return $this->checkCode;
	}

	public function setDelayFee($delayFee)
	{
		$this->delayFee = $delayFee;
		$this->apiParas["delayFee"] = $delayFee;
	}
	public function getDelayFee() {
		return $this->delayFee;
	}

	public function setEngineId($engineId)
	{
		$this->engineId = $engineId;
		$this->apiParas["engineId"] = $engineId;
	}
	public function getEngineId() {
		return $this->engineId;
	}

	public function setFineFee($fineFee)
	{
		$this->fineFee = $fineFee;
		$this->apiParas["fineFee"] = $fineFee;
	}
	public function getFineFee() {
		return $this->fineFee;
	}

	public function setFineNo($fineNo)
	{
		$this->fineNo = $fineNo;
		$this->apiParas["fineNo"] = $fineNo;
	}
	public function getFineNo() {
		return $this->fineNo;
	}

	public function setFineTime($fineTime)
	{
		$this->fineTime = $fineTime;
		$this->apiParas["fineTime"] = $fineTime;
	}
	public function getFineTime() {
		return $this->fineTime;
	}

	public function setFineUnique($fineUnique)
	{
		$this->fineUnique = $fineUnique;
		$this->apiParas["fineUnique"] = $fineUnique;
	}
	public function getFineUnique() {
		return $this->fineUnique;
	}

	public function setFrameId($frameId)
	{
		$this->frameId = $frameId;
		$this->apiParas["frameId"] = $frameId;
	}
	public function getFrameId() {
		return $this->frameId;
	}

	public function setItemId($itemId)
	{
		$this->itemId = $itemId;
		$this->apiParas["itemId"] = $itemId;
	}
	public function getItemId() {
		return $this->itemId;
	}

	public function setOuterTid($outerTid)
	{
		$this->outerTid = $outerTid;
		$this->apiParas["outerTid"] = $outerTid;
	}
	public function getOuterTid() {
		return $this->outerTid;
	}

	public function setProjectNum($projectNum)
	{
		$this->projectNum = $projectNum;
		$this->apiParas["projectNum"] = $projectNum;
	}
	public function getProjectNum() {
		return $this->projectNum;
	}

	public function setProxyFee($proxyFee)
	{
		$this->proxyFee = $proxyFee;
		$this->apiParas["proxyFee"] = $proxyFee;
	}
	public function getProxyFee() {
		return $this->proxyFee;
	}

	public function setTotalAmount($totalAmount)
	{
		$this->totalAmount = $totalAmount;
		$this->apiParas["totalAmount"] = $totalAmount;
	}
	public function getTotalAmount() {
		return $this->totalAmount;
	}

	public function setUnique($unique)
	{
		$this->unique = $unique;
		$this->apiParas["unique"] = $unique;
	}
	public function getUnique() {
		return $this->unique;
	}

	public function getApiMethodName()
	{
		return "qianmi.elife.trafficFine.createBill";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->carNo, "carNo");
		RequestCheckUtil::checkNotNull($this->carType, "carType");
		RequestCheckUtil::checkNotNull($this->delayFee, "delayFee");
		RequestCheckUtil::checkNotNull($this->engineId, "engineId");
		RequestCheckUtil::checkNotNull($this->fineFee, "fineFee");
		RequestCheckUtil::checkNotNull($this->itemId, "itemId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
