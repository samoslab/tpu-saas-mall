<?php
/**
 * API: qianmi.elife.coach.insurs.list request
 * 
 * @author auto create
 * @since 1.0
 */
class CoachInsursListRequest
{
	private $apiParas = array();

	/** 
	 * 标准商品编号
	 */
	private $itemId;

	/** 
	 * 标准商品名称,支持不带特殊字符的模糊匹配
	 */
	private $itemName;

	/** 
	 * 页码，从0开始
	 */
	private $pageNo;

	/** 
	 * 单页返回的记录数
	 */
	private $pageSize;

	public function setItemId($itemId)
	{
		$this->itemId = $itemId;
		$this->apiParas["itemId"] = $itemId;
	}
	public function getItemId() {
		return $this->itemId;
	}

	public function setItemName($itemName)
	{
		$this->itemName = $itemName;
		$this->apiParas["itemName"] = $itemName;
	}
	public function getItemName() {
		return $this->itemName;
	}

	public function setPageNo($pageNo)
	{
		$this->pageNo = $pageNo;
		$this->apiParas["pageNo"] = $pageNo;
	}
	public function getPageNo() {
		return $this->pageNo;
	}

	public function setPageSize($pageSize)
	{
		$this->pageSize = $pageSize;
		$this->apiParas["pageSize"] = $pageSize;
	}
	public function getPageSize() {
		return $this->pageSize;
	}

	public function getApiMethodName()
	{
		return "qianmi.elife.coach.insurs.list";
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
