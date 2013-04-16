<?php
include_once("../Database/RaceRepository.php");
include_once("../Database/StatRepository.php");
include_once("../Templates/ListItemTemplateGenerator.php");

class StatTemplateGenerator
{
	private $_statRepository;
	private $_listItemTemplateGenerator;

	public function __construct()
	{
		$this->_statRepository = new StatRepository();
		$this->_listItemTemplateGenerator = new ListItemTemplateGenerator();
	}

	public function ListStats()
	{
		$stats = $this->_statRepository->GetAllStats();
		foreach ($stats as $stat)
		{
			echo $this->ListStatType($stat['stat']);
		}
		
	}

	public function ListCharacterStats($characterId)
	{

		$stats = $this->_statRepository->GetCharacterStats($characterId);
		foreach ($stats as $key => $value)
		{
			//foreach ($stat as $key => $value) {
				$this->ListCharacterStat($key, $value);
			//}
			//$this->ListStatType($stat);
		}
	}

//unindented because EOF cannot of proceeding whitespace... lolphp
public function ListStatType($statName)
{
   echo  <<<EOF
   	<div>
		<span> $statName </span>
	</div>
EOF;
}

//unindented because EOF cannot of proceeding whitespace... lolphp
public function ListCharacterStat($statName, $statValue)
{
   echo  <<<EOF
   	<div>
		<span> $statName </span>
		<span> $statValue </span>
	</div>
EOF;
}

}