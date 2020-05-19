<?php
/**
 * API: qianmi.elife.units.list request
 * 
 * @author auto create
 * @since 1.0
 */
class UnitsListRequest
{
	private $apiParas = array();

	/** 
	 * 市属性V编号
	 */
	private $cityVid;

	/** 
	 * 缴费项目编号，接口查询返回，多个时以','分隔 :<br>水费-c2670<br>电费-c2680<br>燃气费-c2681<br>有线电视费-c2682
	 */
	private $projectIds;

	/** 
	 * 省属性V编号
	 */
	private $provinceVid;

	public function setCityVid($cityVid)
	{
		$this->cityVid = $cityVid;
		$this->apiParas["cityVid"] = $cityVid;
	}
	public function getCityVid() {
		return $this->cityVid;
	}

	public function setProjectIds($projectIds)
	{
		$this->projectIds = $projectIds;
		$this->apiParas["projectIds"] = $projectIds;
	}
	public function getProjectIds() {
		return $this->projectIds;
	}

	public function setProvinceVid($provinceVid)
	{
		$this->provinceVid = $provinceVid;
		$this->apiParas["provinceVid"] = $provinceVid;
	}
	public function getProvinceVid() {
		return $this->provinceVid;
	}

	public function getApiMethodName()
	{
		return "qianmi.elife.units.list";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->cityVid, "cityVid");
		RequestCheckUtil::checkNotNull($this->projectIds, "projectIds");
		RequestCheckUtil::checkNotNull($this->provinceVid, "provinceVid");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
