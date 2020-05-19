<?php
/**
 * API: qianmi.elife.recharge.base.calcPrice request
 * 
 * @author auto create
 * @since 1.0
 */
class RechargeBaseCalcPriceRequest
{
	private $apiParas = array();

	/** 
	 * 建议零售价设价表达式
	 */
	private $advicePriceExpression;

	/** 
	 * 建议零售价设价方式
	 */
	private $advicePriceOpt;

	/** 
	 * 进价设价表达式
	 */
	private $inPriceExpression;

	/** 
	 * 进价设价方式
	 */
	private $inPriceOpt;

	/** 
	 * 充值金额
	 */
	private $itemNum;

	public function setAdvicePriceExpression($advicePriceExpression)
	{
		$this->advicePriceExpression = $advicePriceExpression;
		$this->apiParas["advicePriceExpression"] = $advicePriceExpression;
	}
	public function getAdvicePriceExpression() {
		return $this->advicePriceExpression;
	}

	public function setAdvicePriceOpt($advicePriceOpt)
	{
		$this->advicePriceOpt = $advicePriceOpt;
		$this->apiParas["advicePriceOpt"] = $advicePriceOpt;
	}
	public function getAdvicePriceOpt() {
		return $this->advicePriceOpt;
	}

	public function setInPriceExpression($inPriceExpression)
	{
		$this->inPriceExpression = $inPriceExpression;
		$this->apiParas["inPriceExpression"] = $inPriceExpression;
	}
	public function getInPriceExpression() {
		return $this->inPriceExpression;
	}

	public function setInPriceOpt($inPriceOpt)
	{
		$this->inPriceOpt = $inPriceOpt;
		$this->apiParas["inPriceOpt"] = $inPriceOpt;
	}
	public function getInPriceOpt() {
		return $this->inPriceOpt;
	}

	public function setItemNum($itemNum)
	{
		$this->itemNum = $itemNum;
		$this->apiParas["itemNum"] = $itemNum;
	}
	public function getItemNum() {
		return $this->itemNum;
	}

	public function getApiMethodName()
	{
		return "qianmi.elife.recharge.base.calcPrice";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->advicePriceExpression, "advicePriceExpression");
		RequestCheckUtil::checkNotNull($this->advicePriceOpt, "advicePriceOpt");
		RequestCheckUtil::checkNotNull($this->inPriceExpression, "inPriceExpression");
		RequestCheckUtil::checkNotNull($this->inPriceOpt, "inPriceOpt");
		RequestCheckUtil::checkNotNull($this->itemNum, "itemNum");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
