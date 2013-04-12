<?php

class Character
{
	private $_name
	private $_class
	private $_race
	private $_alignment
	private $_level;
	private $_xp;

	public function __construct($name, $class, $race, $level, $xp)
	{
		$this->_name = $name;
		$this->_class = $class;
		$this->_race = $race;
		$this->_level = $level;
		$this->_xp = $xp;
	}
}