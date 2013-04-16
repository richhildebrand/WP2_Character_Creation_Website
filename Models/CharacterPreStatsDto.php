<?php

class CharacterPreStatsDto
{
	private $_name;
	private $_race;
	private $_class;
	private $_level;
	private $_alignment;

	public function __construct($name, $level, $class, $race, $alignment, $xp)
	{
		$this->_name = $name;
		$this->_race = $race;
		$this->_class = $class;
		$this->_level = $level;
		$this->_alignment = $alignment;
		$this->_xp = $xp;
	}

	public function GetXp() { return $this->_xp; }
	public function GetName() { return $this->_name; }
	public function GetRace() { return $this->_race; }
	public function GetClass() { return $this->_class; }
	public function GetLevel() { return $this->_level; }
	public function GetAlignment() { return $this->_alignment; }
}