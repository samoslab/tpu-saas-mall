<?php
/**
 * API: qianmi.qmcs.group.add request
 * 
 * @author auto create
 * @since 1.0
 */
class QmcsGroupAddRequest
{
	private $apiParas = array();

	/** 
	 * 分组名称，同一个应用下需要保证唯一性，最长32个字符。添加分组后，消息通道会为用户的消息分配独立分组，但之前的消息还是存储于默认分组中。不能以default开头，default开头为系统默认组。
	 */
	private $groupName;

	/** 
	 * 用户编号列表，以半角逗号分隔
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
		return "qianmi.qmcs.group.add";
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
