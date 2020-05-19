<?php
/**
 * API: bm.elife.cardPassword.payBill request
 * 
 * @author auto create
 * @since 1.0
 */
class BmCardPasswordPayBillRequest
{
	private $apiParas = array();

	/** 
	 * 回调地址
	 */
	private $callback;

	/** 
	 * 标准商品编号
	 */
	private $itemId;

	/** 
	 * 购买数量
	 */
	private $itemNum;

	/** 
	 * 外部订单号
	 */
	private $outerTid;

	/** 
	 * 卡密接收邮箱
	 */
	private $receiveEmail;

	/** 
	 * 卡密接收手机号码
	 */
	private $receiveMobile;

	public function setCallback($callback)
	{
		$this->callback = $callback;
		$this->apiParas["callback"] = $callback;
	}
	public function getCallback() {
		return $this->callback;
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

	public function setOuterTid($outerTid)
	{
		$this->outerTid = $outerTid;
		$this->apiParas["outerTid"] = $outerTid;
	}
	public function getOuterTid() {
		return $this->outerTid;
	}

	public function setReceiveEmail($receiveEmail)
	{
		$this->receiveEmail = $receiveEmail;
		$this->apiParas["receiveEmail"] = $receiveEmail;
	}
	public function getReceiveEmail() {
		return $this->receiveEmail;
	}

	public function setReceiveMobile($receiveMobile)
	{
		$this->receiveMobile = $receiveMobile;
		$this->apiParas["receiveMobile"] = $receiveMobile;
	}
	public function getReceiveMobile() {
		return $this->receiveMobile;
	}

	public function getApiMethodName()
	{
		return "bm.elife.cardPassword.payBill";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->itemId, "itemId");
		RequestCheckUtil::checkNotNull($this->itemNum, "itemNum");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
