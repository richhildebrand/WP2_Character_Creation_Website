<?php
include_once("../Models/CharacterPreStatsDto.php");
include_once("../Models/Character.php");
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
	
	if (!StringHelper::AreNullOrEmptyString($name, $level, $class, $race, $alignment))
	{
		$_SESSION['CharacterPreStatsDto'] = new CharacterPreStatsDto($name, $level, $class, $race, $alignment);
		header("Location: ../Character/GenerateStats.php");
	}

}
elseif(isset($_POST['RollAllStats']))
{
	$startingStatGenerator = new StartingStatGenerator();
	$characterStats = $startingStatGenerator->GererateStartingStats();
	$character = $_SESSION['CharacterPreStatsDto'];
	$member = $_SESSION['user_name'];

	$characterRepository = new CharacterRepository();
	$statRepository = new StatRepository();

	$characterId = $characterRepository->CreateNewCharacter($member,
															$character->GetName(), $character->GetLevel(),
											   		   		$character->GetClass(), $character->GetRace(),
							   				  		   		$character->GetAlignment());
	$statRepository->SaveCharacterStats($characterId, $characterStats);
	
	$_SESSION['Character'] = new Character($characterRepository->GetCharacter($characterId),
										   $statRepository->GetCharacterStats($characterId));
	unset($_SESSION['CharacterPreStatsDto']);
	header("Location: ../Character/Stats.php");
}