<?php

class Stat
{
	private $stat;
	private $value;

	//must use default values to allow fetch_class
	public function __construct($stat = null, $value = null)
	{
		$this->stat = $stat;
		$this->value = $value;
	}

	public function GetStat() { return $this->stat; }
	public function GetValue() { return $this->value; }
}