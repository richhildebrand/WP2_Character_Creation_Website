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
		echo "<table border=1>";
		echo "<tr><td>Stat</td><td>Value</td><td>Modifier</td></tr>";
		foreach ($characterStats as $stat)
		{
			$statname = $stat->GetStat();
			$value = $stat->GetValue();
			$this->ListCharacterStat($statname, $value);
		}
		echo "</table>";
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
	$statMod = floor($statValue/2-5);
   echo  <<<EOF
   	<div>
			<tr>
				<td> $statName </td>
				<td><center> $statValue </center></td>
				<td><center> $statMod </center></td>
			</tr>
	</div>
EOF;
}

}