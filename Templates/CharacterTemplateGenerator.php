<?php
include_once("../Factories/CharacterFactory.php");
include_once("../Models/Character.php");

class CharacterTemplateGenerator 
{
	private $_characterFactory;

	public function __construct()
	{
		$this->_characterFactory = new CharacterFactory();
	}


	public function ListMemeberCharacters($member)
	{
		$characters = $this->_characterFactory->GetMemberCharactersFromDatabase($member);
		
		foreach ($characters as $character)
		{
			echo $this->RadioListCharacter($character);
		}
	}

	public function RadioListCharacter($character)
	{
		$id = $character->GetId();
		$inputType = '<input name="Character" value="' . $id . '" type="radio"/>';
		return $this->ListCharacter($character, $inputType);
	}

public function ListCharacter($character, $inputType = null)
{
	//function calls and dictionary lookups are not allowed inside EOF... lolphp
	$id = $character->GetId();
	$xp = $character->GetXp();
	$name = $character->GetName();
	$race = $character->GetRace();
	$class = $character->GetClass()->GetClass();
	$level = $character->GetLevel();
	$alignment = $character->GetAlignment();

   return <<<EOF
	<div>
		$inputType
		<span> $name </span>
		<span> is a level </span>
		<span> $level </span>
		<span> $alignment </span>
		<span> $race </span>
		<span> $class </span>
	<div>
EOF;

}




}