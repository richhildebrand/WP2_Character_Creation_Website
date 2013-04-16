<?php
include_once("../Models/Character.php");
include_once("../Database/CharacterRepository.php");
include_once("../Database/StatRepository.php");
include_once("../Database/HitPointRepository.php");
include_once("../Database/ClassRepository.php");
include_once("../HItPointLogic/HitPointCalculator.php");

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

		$characterStats = $this->_statRepository->GetCharacterStats($characterId);
		$character->SetStats($characterStats);

		$className = $character->GetClass();
		$characterClass = $this->_classRepository->GetClass($className);
		$character->SetClass($characterClass);

		$characterHitPoints = $this->_hitPointRepository->GetCharacterHitPoints($characterId);
		$character->SetHitPoints($characterHitPoints);

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
}