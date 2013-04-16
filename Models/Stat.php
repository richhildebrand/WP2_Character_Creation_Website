<?php

class Stat
{
	public $stat;
	public $value;

	//must use default values to allow fetch_class
	public function __construct($stat = null, $value = null)
	{
		$this->stat = $stat;
		$this->value = $value;
	}

	public function GetStat() { return $this->stat; }
	public function GetValue() { return $this->value; }
}