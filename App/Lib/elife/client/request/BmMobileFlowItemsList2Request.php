<?php
/**
 * API: bm.elife.mobile.flow.items.list2 request
 * 
 * @author auto create
 * @since 1.0
 */
class BmMobileFlowItemsList2Request
{
	private $apiParas = array();

	/** 
	 * 流量大小，以M或者G为单位(后面不带B)，例如50M,1G
	 */
	private $flow;

	/** 
	 * 国内11位手机号码
	 */
	private $mobileNo;

	/** 
	 * 使用范围：p:省内；c:全国
	 */
	private $useScope;

	public function setFlow($flow)
	{
		$this->flow = $flow;
		$this->apiParas["flow"] = $flow;
	}
	public function getFlow() {
		return $this->flow;
	}

	public function setMobileNo($mobileNo)
	{
		$this->mobileNo = $mobileNo;
		$this->apiParas["mobileNo"] = $mobileNo;
	}
	public function getMobileNo() {
		return $this->mobileNo;
	}

	public function setUseScope($useScope)
	{
		$this->useScope = $useScope;
		$this->apiParas["useScope"] = $useScope;
	}
	public function getUseScope() {
		return $this->useScope;
	}

	public function getApiMethodName()
	{
		return "bm.elife.mobile.flow.items.list2";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->flow, "flow");
		RequestCheckUtil::checkNotNull($this->mobileNo, "mobileNo");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
