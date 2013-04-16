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

		include_once("../Helpers/Logger.php");
		$logger = new Logger();
		$logger->write("hp dice count = " . $hitPointDiceCount);

		$totalHitPoints = $hitPointDiceCount; //should be calculated by DiceRoller;
		$hitPoints = new HitPoints($totalHitPoints, $totalHitPoints);

		$max = $hitPoints->GetMaxHitPoints();
		$logger->write("max = " . $max);
		$logger->write("current = " . $hitPoints->GetCurrentHitPoints());

		return $hitPoints;
	}
}