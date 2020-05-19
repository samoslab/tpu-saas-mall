<?php
/**
 * API: qianmi.elife.mobile.flow.items.list request
 * 
 * @author auto create
 * @since 1.0
 */
class MobileFlowItemsListRequest
{
	private $apiParas = array();

	/** 
	 * 流量大小，以M或者G为单位(后面不带B)，例如50M,1G
	 */
	private $flow;

	/** 
	 * 标准商品编号
	 */
	private $itemId;

	/** 
	 * 标准商品名称,支持不带特殊字符的模糊匹配
	 */
	private $itemName;

	/** 
	 * 国内11位手机号
	 */
	private $mobileNo;

	/** 
	 * 页码 从0开始
	 */
	private $pageNo;

	/** 
	 * 单页返回的记录数
	 */
	private $pageSize;

	public function setFlow($flow)
	{
		$this->flow = $flow;
		$this->apiParas["flow"] = $flow;
	}
	public function getFlow() {
		return $this->flow;
	}

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

	public function setMobileNo($mobileNo)
	{
		$this->mobileNo = $mobileNo;
		$this->apiParas["mobileNo"] = $mobileNo;
	}
	public function getMobileNo() {
		return $this->mobileNo;
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
		return "qianmi.elife.mobile.flow.items.list";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->mobileNo, "mobileNo");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
