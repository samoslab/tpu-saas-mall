<?php
/**
 * API: qianmi.qmcs.group.delete request
 * 
 * @author auto create
 * @since 1.0
 */
class QmcsGroupDeleteRequest
{
	private $apiParas = array();

	/** 
	 * 分组名称，分组删除后，用户的消息将会存储于默认分组中。警告：由于分组已经删除，用户之前未消费的消息将无法再获取。不能以default开头，default开头为系统默认组。
	 */
	private $groupName;

	/** 
	 * 用户编号列表，不传表示删除整个分组，如果用户全部删除后，也会自动删除整个分组
	 */
	private $userIds;

	public function setGroupName($groupName)
	{
		$this->groupName = $groupName;
		$this->apiParas["group_name"] = $groupName;
	}
	public function getGroupName() {
		return $this->groupName;
	}

	public function setUserIds($userIds)
	{
		$this->userIds = $userIds;
		$this->apiParas["user_ids"] = $userIds;
	}
	public function getUserIds() {
		return $this->userIds;
	}

	public function getApiMethodName()
	{
		return "qianmi.qmcs.group.delete";
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
