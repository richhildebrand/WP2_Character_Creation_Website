<?php
include_once("../Models/CharacterPreStatsDto.php");
include_once("../Models/Character.php");
include_once("../Factories/CharacterFactory.php");
include_once("../Database/CharacterRepository.php");
include_once("../Database/StatRepository.php");
include_once("../StatLogic/StartingStatGenerator.php");
include_once("../Helpers/StringHelper.php");

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

	$characterFactory = new CharacterFactory();
	$_SESSION['Character']  = $characterFactory->CreateNewCharacterInDatabase($member, $characterPreStatsDto);
	
	unset($_SESSION['CharacterPreStatsDto']);
	header("Location: ../Character/Stats.php");
}