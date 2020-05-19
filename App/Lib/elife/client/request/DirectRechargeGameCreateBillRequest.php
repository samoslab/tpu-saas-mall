<?php
/**
 * API: qianmi.elife.directRecharge.game.createBill request
 * 
 * @author auto create
 * @since 1.0
 */
class DirectRechargeGameCreateBillRequest
{
	private $apiParas = array();

	/** 
	 * 回调地址
	 */
	private $callback;

	/** 
	 * 游戏区
	 */
	private $gameArea;

	/** 
	 * 游戏服
	 */
	private $gameServer;

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
	 * 游戏帐号(如果是魔兽世界则为战网帐号)
	 */
	private $rechargeAccount;

	/** 
	 * 游戏帐号2(目前只有魔兽世界充值用到，当为魔兽世界商品时，如果不填则为战网下第一个帐号充值)
	 */
	private $rechargeAccount2;

	/** 
	 * Q币资源对应的IP
	 */
	private $rechargeIp;

	public function setCallback($callback)
	{
		$this->callback = $callback;
		$this->apiParas["callback"] = $callback;
	}
	public function getCallback() {
		return $this->callback;
	}

	public function setGameArea($gameArea)
	{
		$this->gameArea = $gameArea;
		$this->apiParas["gameArea"] = $gameArea;
	}
	public function getGameArea() {
		return $this->gameArea;
	}

	public function setGameServer($gameServer)
	{
		$this->gameServer = $gameServer;
		$this->apiParas["gameServer"] = $gameServer;
	}
	public function getGameServer() {
		return $this->gameServer;
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

	public function setRechargeAccount($rechargeAccount)
	{
		$this->rechargeAccount = $rechargeAccount;
		$this->apiParas["rechargeAccount"] = $rechargeAccount;
	}
	public function getRechargeAccount() {
		return $this->rechargeAccount;
	}

	public function setRechargeAccount2($rechargeAccount2)
	{
		$this->rechargeAccount2 = $rechargeAccount2;
		$this->apiParas["rechargeAccount2"] = $rechargeAccount2;
	}
	public function getRechargeAccount2() {
		return $this->rechargeAccount2;
	}

	public function setRechargeIp($rechargeIp)
	{
		$this->rechargeIp = $rechargeIp;
		$this->apiParas["rechargeIp"] = $rechargeIp;
	}
	public function getRechargeIp() {
		return $this->rechargeIp;
	}

	public function getApiMethodName()
	{
		return "qianmi.elife.directRecharge.game.createBill";
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
