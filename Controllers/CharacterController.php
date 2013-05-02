<?php
include_once("../Models/CharacterPreStatsDto.php");
include_once("../Models/Character.php");
include_once("../Factories/CharacterFactory.php");
include_once("../Database/CharacterRepository.php");
include_once("../Database/ClassRepository.php");
include_once("../Database/StatRepository.php");
include_once("../StatLogic/StartingStatGenerator.php");
include_once("../Helpers/StringHelper.php");

$characterFactory = new CharacterFactory();

if(isset($_POST['CreateNewCharacter']))
{
	$name = $_POST['CharacterName'];
	$level = $_POST['StartingLevel'];
	$class = $_POST['Classes'];
	$race = $_POST['Races'];
	$alignment = $_POST['Alignment'];
	$memberEmail = $_SESSION['user_name'];
	$xp = 0; //TODO: calculate from XpCalculator
	
	if (!StringHelper::AreNullOrEmptyString($name, $level, $class, $race, $alignment))
	{
		$_SESSION['CharacterPreStatsDto'] = new CharacterPreStatsDto($name, $level, $class, $race, $alignment, $xp);
		header("Location: ../Character/GenerateStats.php");
	}

}
elseif(isset($_POST['RollAllStats']))
{
	
	$member = $_SESSION['user_name'];
	$characterPreStatsDto = $_SESSION['CharacterPreStatsDto'];

	$_SESSION['Character']  = $characterFactory->CreateNewCharacterInDatabase($member, $characterPreStatsDto);

	unset($_SESSION['CharacterPreStatsDto']);
	header("Location: ../Character/Stats.php");
}
elseif(isset($_POST['SelectCharacter']))
{
	if (!empty($_POST['Character'])) {
		$characterId = $_POST['Character'];
		$_SESSION['Character'] = $characterFactory->GetCharacterFromDatabase($characterId); 

		header("Location: ../Character/Sheet.php");
	} else {
		header("Location: ../Character/Select.php");
	}
	
}
elseif(isset($_POST['LevelUp'])) 
{
	$member = $_SESSION['user_name'];
	$character = $_SESSION['Character'];
	
	$hitPoints = $character->GetHitPoints();
	$maxHitPoints = $hitPoints->GetMaxHitPoints();
	$class = $character->GetClass();
	$characterHitPoints = $class->GetHpDice();
	
	$maxHitPoints = $characterHitPoints + $maxHitPoints;
	
	if ($maxHitPoints <= $characterHitPoints * 20) {
		$hitPoints->SetMaxHitPoints($maxHitPoints);
		$hitPoints->SetCurrentHitPoints($maxHitPoints);
	}

	
	$character->SetHitPoints($hitPoints);
	
	$characterLevel = $character->GetLevel();
	if ($characterLevel < 20) {
		++$characterLevel;
	}
	$character->SetLevel($characterLevel);
	
	$characterFactory->UpdateCharacterInDatabase($member, $character);
	$characterFactory->UpdateCharacterHitPointsInDatabase($character->GetId(), $hitPoints);
	
	header("Location: ../Character/Sheet.php");
}