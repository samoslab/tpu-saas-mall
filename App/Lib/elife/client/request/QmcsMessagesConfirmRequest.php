<?php
/**
 * API: qianmi.qmcs.messages.confirm request
 * 
 * @author auto create
 * @since 1.0
 */
class QmcsMessagesConfirmRequest
{
	private $apiParas = array();

	/** 
	 * 处理成功的消息ID列表，最大200个ID
	 */
	private $sMessageIds;

	public function setsMessageIds($sMessageIds)
	{
		$this->sMessageIds = $sMessageIds;
		$this->apiParas["s_message_ids"] = $sMessageIds;
	}
	public function getsMessageIds() {
		return $this->sMessageIds;
	}

	public function getApiMethodName()
	{
		return "qianmi.qmcs.messages.confirm";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->sMessageIds, "sMessageIds");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
