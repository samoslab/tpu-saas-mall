<?php
/**
 * API: qianmi.qmcs.messages.consume request
 * 
 * @author auto create
 * @since 1.0
 */
class QmcsMessagesConsumeRequest
{
	private $apiParas = array();

	/** 
	 * 用户分组名称，不传表示消费默认分组
	 */
	private $groupName;

	/** 
	 * 每次批量消费消息的条数，默认值100，最多100
	 */
	private $quantity;

	public function setGroupName($groupName)
	{
		$this->groupName = $groupName;
		$this->apiParas["group_name"] = $groupName;
	}
	public function getGroupName() {
		return $this->groupName;
	}

	public function setQuantity($quantity)
	{
		$this->quantity = $quantity;
		$this->apiParas["quantity"] = $quantity;
	}
	public function getQuantity() {
		return $this->quantity;
	}

	public function getApiMethodName()
	{
		return "qianmi.qmcs.messages.consume";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
