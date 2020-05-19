<?php
/**
 * API: qianmi.elife.gasCard.getAccountInfo request
 * 
 * @author auto create
 * @since 1.0
 */
class GasCardGetAccountInfoRequest
{
	private $apiParas = array();

	/** 
	 * 加油卡帐号
	 */
	private $gasCardNo;

	/** 
	 * 加油卡帐号所属供应商sinopec或者cnpc
	 */
	private $operator;

	/** 
	 * 加油卡所属地
	 */
	private $province;

	public function setGasCardNo($gasCardNo)
	{
		$this->gasCardNo = $gasCardNo;
		$this->apiParas["gasCardNo"] = $gasCardNo;
	}
	public function getGasCardNo() {
		return $this->gasCardNo;
	}

	public function setOperator($operator)
	{
		$this->operator = $operator;
		$this->apiParas["operator"] = $operator;
	}
	public function getOperator() {
		return $this->operator;
	}

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
		return "qianmi.elife.gasCard.getAccountInfo";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->gasCardNo, "gasCardNo");
		RequestCheckUtil::checkNotNull($this->operator, "operator");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
