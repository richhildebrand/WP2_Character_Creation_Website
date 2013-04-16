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
			echo $this->ListStatType($stat->GetStat());
		}
		
	}

	public function ListCharacterStats($characterStats)
	{
		foreach ($characterStats as $stat)
		{
			$statname = $stat->GetStat();
			$value = $stat->GetValue();
			$this->ListCharacterStat($statname, $value);
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