<?php
/**
 * API: qianmi.elife.bankTransfer.createBill request
 * 
 * @author auto create
 * @since 1.0
 */
class BankTransferCreateBillRequest
{
	private $apiParas = array();

	/** 
	 * 金额
	 */
	private $amount;

	/** 
	 * 银行卡号
	 */
	private $bankCardNo;

	/** 
	 * 回调地址
	 */
	private $callback;

	/** 
	 * 客户名称
	 */
	private $customerName;

	/** 
	 * 客户电话
	 */
	private $customerTel;

	/** 
	 * 标准商品编号
	 */
	private $itemId;

	/** 
	 * 外部订单号
	 */
	private $outerTid;

	/** 
	 * 转账银行ID
	 */
	private $targetBankId;

	/** 
	 * 转账银行名称
	 */
	private $targetBankName;

	public function setAmount($amount)
	{
		$this->amount = $amount;
		$this->apiParas["amount"] = $amount;
	}
	public function getAmount() {
		return $this->amount;
	}

	public function setBankCardNo($bankCardNo)
	{
		$this->bankCardNo = $bankCardNo;
		$this->apiParas["bankCardNo"] = $bankCardNo;
	}
	public function getBankCardNo() {
		return $this->bankCardNo;
	}

	public function setCallback($callback)
	{
		$this->callback = $callback;
		$this->apiParas["callback"] = $callback;
	}
	public function getCallback() {
		return $this->callback;
	}

	public function setCustomerName($customerName)
	{
		$this->customerName = $customerName;
		$this->apiParas["customerName"] = $customerName;
	}
	public function getCustomerName() {
		return $this->customerName;
	}

	public function setCustomerTel($customerTel)
	{
		$this->customerTel = $customerTel;
		$this->apiParas["customerTel"] = $customerTel;
	}
	public function getCustomerTel() {
		return $this->customerTel;
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

	public function setTargetBankId($targetBankId)
	{
		$this->targetBankId = $targetBankId;
		$this->apiParas["targetBankId"] = $targetBankId;
	}
	public function getTargetBankId() {
		return $this->targetBankId;
	}

	public function setTargetBankName($targetBankName)
	{
		$this->targetBankName = $targetBankName;
		$this->apiParas["targetBankName"] = $targetBankName;
	}
	public function getTargetBankName() {
		return $this->targetBankName;
	}

	public function getApiMethodName()
	{
		return "qianmi.elife.bankTransfer.createBill";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->amount, "amount");
		RequestCheckUtil::checkNotNull($this->bankCardNo, "bankCardNo");
		RequestCheckUtil::checkNotNull($this->customerName, "customerName");
		RequestCheckUtil::checkNotNull($this->customerTel, "customerTel");
		RequestCheckUtil::checkNotNull($this->itemId, "itemId");
		RequestCheckUtil::checkNotNull($this->targetBankId, "targetBankId");
		RequestCheckUtil::checkNotNull($this->targetBankName, "targetBankName");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
