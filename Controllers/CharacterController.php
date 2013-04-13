<?php
include_once("../Models/CharacterPreStatsDto.php");
include_once("../Helpers/StringHelper.php");

if(isset($_POST['CreateNewCharacter']))
{
	$name = $_POST['CharacterName'];
	$level = $_POST['StartingLevel'];
	$class = $_POST['Classes'];
	$race = $_POST['Races'];
	$alignment = $_POST['Alignment'];
	$memberEmail = $_SESSION['user_name'];
	
	if (!StringHelper::AreNullOrEmptyString($name, $level, $class, $race, $alignment))
	{
		$_SESSION['CharacterPreStatsDto'] = new CharacterPreStatsDto($name, $level, $class, $race, $alignment);
		header("Location: ../Character/GenerateStats.php");
	}

}