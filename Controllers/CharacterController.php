<?php
include_once("../Database/CharacterRepository.php");
include_once("../Helpers/StringHelper.php");

if(isset($_POST['CreateNewCharacter']))
{
	$name = $_POST['CharacterName'];
	$level = $_POST['StartingLevel'];
	$class = $_POST['Classes'];
	$race = $_POST['Races'];
	$memberEmail = $_SESSION['user_name'];
	
	if (!StringHelper::AreNullOrEmptyString($name, $level, $class, $race))
	{
		$characterRepository = new CharacterRepository();
		$characterRepository->CreateNewCharacter($memberEmail, $name, $level, $class, $race);
		header("Location: ../Character/Select.php");
	}

}