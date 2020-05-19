<?php
/**
 * API: qianmi.elife.game.classes.list request
 * 
 * @author auto create
 * @since 1.0
 */
class GameClassesListRequest
{
	private $apiParas = array();

	/** 
	 * 充值类型 1:直充 2:卡密
	 */
	private $chargeType;

	/** 
	 * 游戏名称V编号
	 */
	private $gameId;

	public function setChargeType($chargeType)
	{
		$this->chargeType = $chargeType;
		$this->apiParas["chargeType"] = $chargeType;
	}
	public function getChargeType() {
		return $this->chargeType;
	}

	public function setGameId($gameId)
	{
		$this->gameId = $gameId;
		$this->apiParas["gameId"] = $gameId;
	}
	public function getGameId() {
		return $this->gameId;
	}

	public function getApiMethodName()
	{
		return "qianmi.elife.game.classes.list";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->gameId, "gameId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
