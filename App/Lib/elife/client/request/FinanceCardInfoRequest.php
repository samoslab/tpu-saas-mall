<?php
/**
 * API: qianmi.elife.finance.card.info request
 * 
 * @author auto create
 * @since 1.0
 */
class FinanceCardInfoRequest
{
	private $apiParas = array();

	/** 
	 * 银行卡号
	 */
	private $bankCardNo;

	public function setBankCardNo($bankCardNo)
	{
		$this->bankCardNo = $bankCardNo;
		$this->apiParas["bankCardNo"] = $bankCardNo;
	}
	public function getBankCardNo() {
		return $this->bankCardNo;
	}

	public function getApiMethodName()
	{
		return "qianmi.elife.finance.card.info";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->bankCardNo, "bankCardNo");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
