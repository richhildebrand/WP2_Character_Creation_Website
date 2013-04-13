<?php
include_once("../Database/StatRepository.php");

class StatTemplateGenerator
{
	private $_statRepository;

	public function __construct()
	{
		$this->_statRepository = new StatRepository();
	}

	public function ListStatsTypes()
	{
		$stats = $this->_statRepository->GetAllStatTypes();
		foreach ($stats as $stat)
		{
			$this->ListStatType($stat);
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