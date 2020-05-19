<?php
/**
 * API: qianmi.elife.regions.list request
 * 
 * @author auto create
 * @since 1.0
 */
class RegionsListRequest
{
	private $apiParas = array();

	/** 
	 * 省属性名称,不带'省',传入时仅返回该省市区域信息
	 */
	private $province;

	public function setProvince($province)
	{
		$this->province = $province;
		$this->apiParas["province"] = $province;
	}
	public function getProvince() {
		return $this->province;
	}

	public function getApiMethodName()
	{
		return "qianmi.elife.regions.list";
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
