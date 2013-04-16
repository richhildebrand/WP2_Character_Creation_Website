<?php

class CharacterClass
{
	private $class;
	private $hp_dice_count;
	private $skill_points;
	private $url;

	public function GetClass() { return $this->class; }
	public function GetHpDice() { return $this->hp_dice_count; }
	public function GetSkillPoints() { return $this->skill_points; }
	public function GetUrl() { return $this->url; }
}