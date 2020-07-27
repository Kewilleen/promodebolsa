<?php
/**
 * 
 */
class API implements Version
{

	private $max;
	private $min;

	function __construct($max = 99.999)
	{
		$min = 0;
		$this->max = $max;
	}

	public function getMax()
	{
		return $this->max;
	}

	public function setMax($max = 99.999)
	{
		$this->max = $max;
	}

	public function isMax($number) {
		return $number > $this->max;
	}

	public function getMin()
	{
		return $this->min;
	}

	public function setMin($min = 0)
	{
		$this->min = $min;
	}

	public function isMin($number) {
		return $number > $this->min;
	}

	public function generateNumber($divisor = 99.999) {
		return rand($this->getMin() * $divisor, $this->getMax() * $divisor) / $divisor;
	}
}