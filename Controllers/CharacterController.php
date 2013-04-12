<?php
include_once("../Database/CharacterRepository.php");
include_once("../Helpers/StringHelper.php");

if(isset($_POST['CreateNewCharacter']))
{
	$name = $_POST['CharacterName'];
	$level = $_POST['StartingLevel'];
	$class = $_POST['Classes'];
	$race = $_POST['Races'];
	
	if (!StringHelper::AreNullOrEmpyt($name, $level, $class, $race))
	{
		$characterRepository = new CharacterRepository();
		$characterRepository->CreateNewCharacter($name, $level, $class, $race);
		header("Location: ../Character/Select.php");
	}

}