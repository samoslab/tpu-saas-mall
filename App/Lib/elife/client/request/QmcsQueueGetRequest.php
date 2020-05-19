<?php
/**
 * API: qianmi.qmcs.queue.get request
 * 
 * @author auto create
 * @since 1.0
 */
class QmcsQueueGetRequest
{
	private $apiParas = array();

	/** 
	 * null
	 */
	private $groupName;

	public function setGroupName($groupName)
	{
		$this->groupName = $groupName;
		$this->apiParas["group_name"] = $groupName;
	}
	public function getGroupName() {
		return $this->groupName;
	}

	public function getApiMethodName()
	{
		return "qianmi.qmcs.queue.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->groupName, "groupName");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
