<?php
/**
 * API: bm.elife.gasCard.payBill request
 * 
 * @author auto create
 * @since 1.0
 */
class BmGasCardPayBillRequest
{
	private $apiParas = array();

	/** 
	 * 回调地址
	 */
	private $callback;

	/** 
	 * 卡号类型
	 */
	private $cardType;

	/** 
	 * 持卡人姓名
	 */
	private $gasCardName;

	/** 
	 * 加油卡卡号
	 */
	private $gasCardNo;

	/** 
	 * 持卡人手机号码
	 */
	private $gasCardTel;

	/** 
	 * 标准商品编号
	 */
	private $itemId;

	/** 
	 * 外部订单号
	 */
	private $outerTid;

	/** 
	 * 省份名称（不带省）
	 */
	private $province;

	/** 
	 * 充值金额
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

	public function setCardType($cardType)
	{
		$this->cardType = $cardType;
		$this->apiParas["cardType"] = $cardType;
	}
	public function getCardType() {
		return $this->cardType;
	}

	public function setGasCardName($gasCardName)
	{
		$this->gasCardName = $gasCardName;
		$this->apiParas["gasCardName"] = $gasCardName;
	}
	public function getGasCardName() {
		return $this->gasCardName;
	}

	public function setGasCardNo($gasCardNo)
	{
		$this->gasCardNo = $gasCardNo;
		$this->apiParas["gasCardNo"] = $gasCardNo;
	}
	public function getGasCardNo() {
		return $this->gasCardNo;
	}

	public function setGasCardTel($gasCardTel)
	{
		$this->gasCardTel = $gasCardTel;
		$this->apiParas["gasCardTel"] = $gasCardTel;
	}
	public function getGasCardTel() {
		return $this->gasCardTel;
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

	public function setProvince($province)
	{
		$this->province = $province;
		$this->apiParas["province"] = $province;
	}
	public function getProvince() {
		return $this->province;
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
		return "bm.elife.gasCard.payBill";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->gasCardName, "gasCardName");
		RequestCheckUtil::checkNotNull($this->gasCardNo, "gasCardNo");
		RequestCheckUtil::checkNotNull($this->gasCardTel, "gasCardTel");
		RequestCheckUtil::checkNotNull($this->itemId, "itemId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
