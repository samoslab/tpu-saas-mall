<?php
/**
 * API: qianmi.elife.catv.createBill request
 * 
 * @author auto create
 * @since 1.0
 */
class CatvCreateBillRequest
{
	private $apiParas = array();

	/** 
	 * 回调地址
	 */
	private $callback;

	/** 
	 * 客户地址
	 */
	private $customerAddress;

	/** 
	 * 用户姓名
	 */
	private $customerName;

	/** 
	 * 标准商品编号
	 */
	private $itemId;

	/** 
	 * 外部订单号
	 */
	private $outerTid;

	/** 
	 * 缴费账号或户号，卡号
	 */
	private $rechargeAccount;

	/** 
	 * 充值金额，支持两位小数
	 */
	private $rechargeAmount;

	public function setCallback($callback)
	{
		$this->callback = $callback;
		$this->apiParas["callback"] = $callback;
	}
	public function getCallback() {
		return $this->callback;
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

	public function setOuterTid($outerTid)
	{
		$this->outerTid = $outerTid;
		$this->apiParas["outerTid"] = $outerTid;
	}
	public function getOuterTid() {
		return $this->outerTid;
	}

	public function setRechargeAccount($rechargeAccount)
	{
		$this->rechargeAccount = $rechargeAccount;
		$this->apiParas["rechargeAccount"] = $rechargeAccount;
	}
	public function getRechargeAccount() {
		return $this->rechargeAccount;
	}

	public function setRechargeAmount($rechargeAmount)
	{
		$this->rechargeAmount = $rechargeAmount;
		$this->apiParas["rechargeAmount"] = $rechargeAmount;
	}
	public function getRechargeAmount() {
		return $this->rechargeAmount;
	}

	public function getApiMethodName()
	{
		return "qianmi.elife.catv.createBill";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->itemId, "itemId");
		RequestCheckUtil::checkNotNull($this->rechargeAccount, "rechargeAccount");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
