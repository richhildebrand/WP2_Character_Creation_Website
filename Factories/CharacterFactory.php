<?php
include_once("../Models/Character.php");
include_once("../Database/CharacterRepository.php");
include_once("../Database/StatRepository.php");
include_once("../Database/HitPointRepository.php");
include_once("../Database/ClassRepository.php");
include_once("../HitPointLogic/HitPointCalculator.php");

class CharacterFactory
{
	private $_characterRepository;
	private $_statRepository;
	private $_classRepository;
	private $_hitPointRepository;

	public function __construct()
	{
		$this->_characterRepository = new CharacterRepository();
		$this->_statRepository = new StatRepository();
		$this->_classRepository = new ClassRepository();
		$this->_hitPointRepository = new HitPointRepository();
	}

	public function GetCharacterFromDatabase($characterId)
	{
		$character = $this->_characterRepository->GetCharacter($characterId);
		$this->LoadAllCharacterDetails($character);

		return $character;
	}

	public function CreateNewCharacterInDatabase($member, $characterPreStatsDto)
	{
		$characterId = $this->_characterRepository->CreateNewCharacter($member, $characterPreStatsDto);

		$startingStatGenerator = new StartingStatGenerator();
		$characterStats = $startingStatGenerator->GererateStartingStats();
		$this->_statRepository->SaveCharacterStats($characterId, $characterStats);

		$hitPointCalculator = new HitPointCalculator();
		$characterHitPoints = $hitPointCalculator->GenerateStatingHitPoints($characterPreStatsDto->GetClass());
		$this->_hitPointRepository->SaveCharacterHitPoints($characterId, $characterHitPoints);

		return $this->GetCharacterFromDatabase($characterId);
	}

	public function GetMemberCharactersFromDatabase($memberId)
	{
		$memberCharacters = $this->_characterRepository->GetMemberCharacters($memberId);
		foreach ($memberCharacters as $character)
		{
			$this->LoadAllCharacterDetails($character);
		}
		return $memberCharacters;
	}

	private function LoadAllCharacterDetails($character)
	{
		$this->LoadCharacterStats($character);
		$this->LoadCharacterClass($character);
		$this->LoadCharacterHitPoints($character);	
	}

	private function LoadCharacterStats($character)
	{
		$characterStats = $this->_statRepository->GetCharacterStats($character->GetId());
		$character->SetStats($characterStats);
	}

	private function LoadCharacterHitPoints($character)
	{
		$characterHitPoints = $this->_hitPointRepository->GetCharacterHitPoints($character->GetId());
		$character->SetHitPoints($characterHitPoints);
	}

	private function LoadCharacterClass($character)
	{
		$className = $character->GetClass(); //class is not yet an object
		$characterClass = $this->_classRepository->GetClass($className);
		$character->SetClass($characterClass);
	}
	
	public function UpdateCharacterInDatabase($member, $character)
	{
		$this->_characterRepository->UpdateCharacter($member, $character);
	}
	
	public function UpdateCharacterHitPointsInDatabase($character_id, $characterHitPoints)
	{
		$this->_hitPointRepository->UpdateCharacterHitPoints($character_id, $characterHitPoints);
	}
}