<?php
include_once("../Templates/ListItemTemplateGenerator.php");
include_once("../Database/CharacterRepository.php");
include_once("../Models/Character.php");

class CharacterTemplateGenerator 
{
	private $_characterRepository;

	public function __construct()
	{
		$this->_characterRepository = new CharacterRepository();
	}


	public function ListMemeberCharacters($member)
	{
		$characters = $this->_characterRepository->GetMemberCharacters($member);
		foreach ($characters as $character)
		{
			echo $this->RadioListCharacter($character);
		}
	}

//unindented because EOF cannot of proceeding whitespace... lolphp
public function RadioListCharacter($character)
{

	//function calls and dictionary lookups are not allowed inside EOF... lolphp
	$id = $character['id'];
	$xp = $character['xp'];
	$name = $character['name'];
	$race = $character['race'];
	$class = $character['class'];
	$level = $character['level'];
	$alignment = $character['alignment'];

   return <<<EOF
	<div>
		<input name="Character" value="$id" type="radio"/>
		<span> $name </span>
		<span> $race </span>
		<span> $class </span>
		<span> $level </span>
		<span> $xp </span>
		<span> $alignment </span>
	<div>
EOF;
}

}