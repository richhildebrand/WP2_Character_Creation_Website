<?php

class Character
{
	private $_id;
	private $_xp;
	private $_name;
	private $_race;
	private $_class;
	private $_level;
	private $_alignment;

	public function __construct($characterDetails)
	{
		$this->_id = $characterDetails['id'];
		$this->_xp = $characterDetails['xp'];
		$this->_name = $characterDetails['name'];
		$this->_race = $characterDetails['race'];
		$this->_class = $characterDetails['class'];
		$this->_level = $characterDetails['level'];
		$this->_alignment = $characterDetails['alignment'];
		
	}

	public function GetId() { return $this->_id; }
	public function GetXp() { return $this->_xp; }
	public function GetName() { return $this->_name; }
	public function GetRace() { return $this->_race; }
	public function GetClass() { return $this->_class; }
	public function GetLevel() { return $this->_level; }
	public function GetAlignment() { return $this->_alignment; }
}