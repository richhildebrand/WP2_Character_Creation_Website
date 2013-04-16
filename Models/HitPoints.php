<?php

class HitPoints
{
	private $max_hp;
	private $current_hp;

	//must use default values to allow fetch_class
	public function __construct($max_hp = null, $current_hp = null)
	{
		$this->max_hp = $max_hp;
		$this->current_hp = $current_hp;
	}

	public function GetMaxHitPoints() { return $this->max_hp; }
	public function GetCurrentHitPoints() { return $this->current_hp; }
}
