<?php
include_once("../Models/Character.php");
include_once("../Database/CharacterRepository.php");
include_once("../Database/StatRepository.php");
include_once("../Database/ClassRepository.php");

class CharacterFactory
{
	private $_characterRepository;
	private $_statRepository;
	private $_classRepository;

	public function __construct()
	{
		$this->_characterRepository = new CharacterRepository();
		$this->_statRepository = new StatRepository();
		$this->_classRepository = new ClassRepository();
	}

	public function GetCharacterFromDatabase($characterId)
	{
		$character = $this->_characterRepository->GetCharacter($characterId);

		$characterStats = $this->_statRepository->GetCharacterStats($characterId);
		$character->SetStats($characterStats);

		$className = $character->GetClass();
		$characterClass = $this->_classRepository->GetClass($className);
		$character->SetClass($characterClass);
		return $character;
	}

	public function CreateNewCharacterInDatabase($member, $characterPreStatsDto)
	{
		$startingStatGenerator = new StartingStatGenerator();
		$characterStats = $startingStatGenerator->GererateStartingStats();

		$characterId = $this->_characterRepository->CreateNewCharacter($member,
																	   $characterPreStatsDto->GetName(), 
																	   $characterPreStatsDto->GetLevel(),
												   		   			   $characterPreStatsDto->GetClass(),
												   		   			   $characterPreStatsDto->GetRace(),
								   				  		   			   $characterPreStatsDto->GetAlignment());
		$this->_statRepository->SaveCharacterStats($characterId, $characterStats);

		return $this->GetCharacterFromDatabase($characterId);
	}
}