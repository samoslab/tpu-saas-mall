<?php
/**
 * API: qianmi.elife.directRecharge.game.item.list request
 * 
 * @author auto create
 * @since 1.0
 */
class DirectRechargeGameItemListRequest
{
	private $apiParas = array();

	/** 
	 * 品牌名称
	 */
	private $brand;

	/** 
	 * 市属性名称
	 */
	private $city;

	/** 
	 * 市属性V编号
	 */
	private $cityVid;

	/** 
	 * 商品面值名称
	 */
	private $faceName;

	/** 
	 * ^\d{1,6}$
	 */
	private $faceValue;

	/** 
	 * 充值类型 1 直充，2卡密，3慢充，4 实物
	 */
	private $itemChargeType;

	/** 
	 * 标准商品编号
	 */
	private $itemId;

	/** 
	 * 标准商品名称
	 */
	private $itemName;

	/** 
	 * 标准商品类型
	 */
	private $itemType;

	/** 
	 * 页码,0开始
	 */
	private $pageNo;

	/** 
	 * 返回条数
	 */
	private $pageSize;

	/** 
	 * 标准类目编号
	 */
	private $projectId;

	/** 
	 * 标准类目名称
	 */
	private $projectName;

	/** 
	 * 省属性名称
	 */
	private $province;

	/** 
	 * 省属性V编号
	 */
	private $provinceVid;

	/** 
	 * 充值模板编号字符串组合
	 */
	private $rechargeTplids;

	public function setBrand($brand)
	{
		$this->brand = $brand;
		$this->apiParas["brand"] = $brand;
	}
	public function getBrand() {
		return $this->brand;
	}

	public function setCity($city)
	{
		$this->city = $city;
		$this->apiParas["city"] = $city;
	}
	public function getCity() {
		return $this->city;
	}

	public function setCityVid($cityVid)
	{
		$this->cityVid = $cityVid;
		$this->apiParas["cityVid"] = $cityVid;
	}
	public function getCityVid() {
		return $this->cityVid;
	}

	public function setFaceName($faceName)
	{
		$this->faceName = $faceName;
		$this->apiParas["faceName"] = $faceName;
	}
	public function getFaceName() {
		return $this->faceName;
	}

	public function setFaceValue($faceValue)
	{
		$this->faceValue = $faceValue;
		$this->apiParas["faceValue"] = $faceValue;
	}
	public function getFaceValue() {
		return $this->faceValue;
	}

	public function setItemChargeType($itemChargeType)
	{
		$this->itemChargeType = $itemChargeType;
		$this->apiParas["itemChargeType"] = $itemChargeType;
	}
	public function getItemChargeType() {
		return $this->itemChargeType;
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

	public function setItemType($itemType)
	{
		$this->itemType = $itemType;
		$this->apiParas["itemType"] = $itemType;
	}
	public function getItemType() {
		return $this->itemType;
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

	public function setProjectId($projectId)
	{
		$this->projectId = $projectId;
		$this->apiParas["projectId"] = $projectId;
	}
	public function getProjectId() {
		return $this->projectId;
	}

	public function setProjectName($projectName)
	{
		$this->projectName = $projectName;
		$this->apiParas["projectName"] = $projectName;
	}
	public function getProjectName() {
		return $this->projectName;
	}

	public function setProvince($province)
	{
		$this->province = $province;
		$this->apiParas["province"] = $province;
	}
	public function getProvince() {
		return $this->province;
	}

	public function setProvinceVid($provinceVid)
	{
		$this->provinceVid = $provinceVid;
		$this->apiParas["provinceVid"] = $provinceVid;
	}
	public function getProvinceVid() {
		return $this->provinceVid;
	}

	public function setRechargeTplids($rechargeTplids)
	{
		$this->rechargeTplids = $rechargeTplids;
		$this->apiParas["rechargeTplids"] = $rechargeTplids;
	}
	public function getRechargeTplids() {
		return $this->rechargeTplids;
	}

	public function getApiMethodName()
	{
		return "qianmi.elife.directRecharge.game.item.list";
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
