<?php
/**
 * API: qianmi.elife.finance.banks.list request
 * 
 * @author auto create
 * @since 1.0
 */
class FinanceBanksListRequest
{
	private $apiParas = array();

	/** 
	 * 银行编码
	 */
	private $code;

	/** 
	 * 是否热门 Y-热门 N-非热门
	 */
	private $hot;

	/** 
	 * 银行中文名,支持模糊匹配
	 */
	private $name;

	/** 
	 * 银行名称拼音前缀
	 */
	private $prepin;

	/** 
	 * 银行名称短拼
	 */
	private $shortpin;

	public function setCode($code)
	{
		$this->code = $code;
		$this->apiParas["code"] = $code;
	}
	public function getCode() {
		return $this->code;
	}

	public function setHot($hot)
	{
		$this->hot = $hot;
		$this->apiParas["hot"] = $hot;
	}
	public function getHot() {
		return $this->hot;
	}

	public function setName($name)
	{
		$this->name = $name;
		$this->apiParas["name"] = $name;
	}
	public function getName() {
		return $this->name;
	}

	public function setPrepin($prepin)
	{
		$this->prepin = $prepin;
		$this->apiParas["prepin"] = $prepin;
	}
	public function getPrepin() {
		return $this->prepin;
	}

	public function setShortpin($shortpin)
	{
		$this->shortpin = $shortpin;
		$this->apiParas["shortpin"] = $shortpin;
	}
	public function getShortpin() {
		return $this->shortpin;
	}

	public function getApiMethodName()
	{
		return "qianmi.elife.finance.banks.list";
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
