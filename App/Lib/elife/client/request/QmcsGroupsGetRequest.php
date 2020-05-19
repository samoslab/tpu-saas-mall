<?php
/**
 * API: qianmi.qmcs.groups.get request
 * 
 * @author auto create
 * @since 1.0
 */
class QmcsGroupsGetRequest
{
	private $apiParas = array();

	/** 
	 * 分组列表
	 */
	private $groupNames;

	/** 
	 * 页码
	 */
	private $pageNo;

	/** 
	 * 每页条数
	 */
	private $pageSize;

	public function setGroupNames($groupNames)
	{
		$this->groupNames = $groupNames;
		$this->apiParas["group_names"] = $groupNames;
	}
	public function getGroupNames() {
		return $this->groupNames;
	}

	public function setPageNo($pageNo)
	{
		$this->pageNo = $pageNo;
		$this->apiParas["page_no"] = $pageNo;
	}
	public function getPageNo() {
		return $this->pageNo;
	}

	public function setPageSize($pageSize)
	{
		$this->pageSize = $pageSize;
		$this->apiParas["page_size"] = $pageSize;
	}
	public function getPageSize() {
		return $this->pageSize;
	}

	public function getApiMethodName()
	{
		return "qianmi.qmcs.groups.get";
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
