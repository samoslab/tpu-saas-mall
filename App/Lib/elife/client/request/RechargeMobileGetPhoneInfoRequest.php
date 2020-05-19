<?php
/**
 * API: qianmi.elife.recharge.mobile.getPhoneInfo request
 * 
 * @author auto create
 * @since 1.0
 */
class RechargeMobileGetPhoneInfoRequest
{
	private $apiParas = array();

	/** 
	 *  所在市名称
	 */
	private $city;

	/** 
	 *  运营商名称
	 */
	private $operator;

	/** 
	 * 固话或者手机号码
	 */
	private $phoneNo;

	/** 
	 *  所在省名称
	 */
	private $province;

	/** 
	 * 返回值内容类型 area:仅返回区域信息 detail:仅返回账户详情(包含余额) all:返回所有信息,默认返回区域
	 */
	private $respType;

	public function setCity($city)
	{
		$this->city = $city;
		$this->apiParas["city"] = $city;
	}
	public function getCity() {
		return $this->city;
	}

	public function setOperator($operator)
	{
		$this->operator = $operator;
		$this->apiParas["operator"] = $operator;
	}
	public function getOperator() {
		return $this->operator;
	}

	public function setPhoneNo($phoneNo)
	{
		$this->phoneNo = $phoneNo;
		$this->apiParas["phoneNo"] = $phoneNo;
	}
	public function getPhoneNo() {
		return $this->phoneNo;
	}

	public function setProvince($province)
	{
		$this->province = $province;
		$this->apiParas["province"] = $province;
	}
	public function getProvince() {
		return $this->province;
	}

	public function setRespType($respType)
	{
		$this->respType = $respType;
		$this->apiParas["respType"] = $respType;
	}
	public function getRespType() {
		return $this->respType;
	}

	public function getApiMethodName()
	{
		return "qianmi.elife.recharge.mobile.getPhoneInfo";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->phoneNo, "phoneNo");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
