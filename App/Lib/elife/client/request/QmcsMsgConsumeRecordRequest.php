<?php
/**
 * API: qianmi.qmcs.msg.consume.record request
 * 
 * @author auto create
 * @since 1.0
 */
class QmcsMsgConsumeRecordRequest
{
	private $apiParas = array();

	/** 
	 * 用户自定义的消息分组名称
	 */
	private $groupName;

	/** 
	 * 消息ID
	 */
	private $id;

	/** 
	 * 消息主题
	 */
	private $topic;

	public function setGroupName($groupName)
	{
		$this->groupName = $groupName;
		$this->apiParas["group_name"] = $groupName;
	}
	public function getGroupName() {
		return $this->groupName;
	}

	public function setId($id)
	{
		$this->id = $id;
		$this->apiParas["id"] = $id;
	}
	public function getId() {
		return $this->id;
	}

	public function setTopic($topic)
	{
		$this->topic = $topic;
		$this->apiParas["topic"] = $topic;
	}
	public function getTopic() {
		return $this->topic;
	}

	public function getApiMethodName()
	{
		return "qianmi.qmcs.msg.consume.record";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->id, "id");
		RequestCheckUtil::checkNotNull($this->topic, "topic");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
