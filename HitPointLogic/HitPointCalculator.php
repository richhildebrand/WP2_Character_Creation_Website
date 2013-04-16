<?php
include_once("../Database/ClassRepository.php");
include_once("../Models/CharacterClass.php");
include_once("../Models/HitPoints.php");

class HitPointCalculator
{
	public function GenerateStatingHitPoints($className)
	{
		$classRepository = new ClassRepository();
		$class = $classRepository->GetClass($className);
		
		$hitPointDiceCount = $class->GetHpDice();
		$totalHitPoints = $hitPointDiceCount; // TODO: use DiceRoller;
		
		$hitPoints = new HitPoints($totalHitPoints, $totalHitPoints);
		return $hitPoints;
	}
}