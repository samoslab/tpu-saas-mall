<?php
/**
 * API: qianmi.qmcs.user.cancel request
 * 
 * @author auto create
 * @since 1.0
 */
class QmcsUserCancelRequest
{
	private $apiParas = array();

	/** 
	 * 用户编号
	 */
	private $userId;

	public function setUserId($userId)
	{
		$this->userId = $userId;
		$this->apiParas["user_id"] = $userId;
	}
	public function getUserId() {
		return $this->userId;
	}

	public function getApiMethodName()
	{
		return "qianmi.qmcs.user.cancel";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->userId, "userId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
