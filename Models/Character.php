<?php

class Character
{
	private $id;
	private $xp;
	private $name;
	private $race;
	private $class;
	private $level;
	private $alignment;

	public function GetId() { return $this->id; }
	public function GetXp() { return $this->xp; }
	public function GetName() { return $this->name; }
	public function GetRace() { return $this->race; }
	public function GetClass() { return $this->class; }
	public function GetLevel() { return $this->level; }
	public function GetAlignment() { return $this->alignment; }

	public function GetStats() { return $this->stats; }
	public function SetStats($stats) { $this->stats = $stats; }
}