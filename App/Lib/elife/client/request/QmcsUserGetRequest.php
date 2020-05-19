<?php
/**
 * API: qianmi.qmcs.user.get request
 * 
 * @author auto create
 * @since 1.0
 */
class QmcsUserGetRequest
{
	private $apiParas = array();

	/** 
	 * 需要返回的字段，多个字段之间以逗号分隔
	 */
	private $fields;

	/** 
	 * 用户编号
	 */
	private $userId;

	public function setFields($fields)
	{
		$this->fields = $fields;
		$this->apiParas["fields"] = $fields;
	}
	public function getFields() {
		return $this->fields;
	}

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
		return "qianmi.qmcs.user.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->fields, "fields");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
