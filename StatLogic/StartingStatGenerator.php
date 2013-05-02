<?php
include_once("../Database/StatRepository.php");

class StartingStatGenerator
{
	private $_statRepository;

	public function __construct()
	{
		$this->_statRepository = new StatRepository();
	}

	public function GererateStartingStats()
	{
		$stats = $this->_statRepository->GetAllStats();
		$characterStats = array();

		foreach ($stats as $stat)
		{
			$statValue = rollstat(); //TODO: Use StatCalculator
			$newStat = new Stat($stat->GetStat(), $statValue);
			array_push($characterStats, $newStat);
		}

		return $characterStats;
	}
	
}

function rollstat()
	{
		$total=0;
		for($i=0;$i<3;$i++)
		{
			$newdie=mt_rand(1,6);
			$total=$total+$newdie;
		}
		return $total;
	}
	