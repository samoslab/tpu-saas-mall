<?php
/**
 * API: qianmi.elife.video.card.createBill request
 * 
 * @author auto create
 * @since 1.0
 */
class VideoCardCreateBillRequest
{
	private $apiParas = array();

	/** 
	 * 充值账号，各大视频网站的会员号
	 */
	private $account;

	/** 
	 * 回调地址
	 */
	private $callback;

	/** 
	 * 标准商品编号
	 */
	private $itemId;

	/** 
	 * 外部订单号
	 */
	private $outerTid;

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

	public function getApiMethodName()
	{
		return "qianmi.elife.video.card.createBill";
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
