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
			$statValue = 3;
			$newStat = new Stat($stat->GetStat(), $statValue);
			array_push($characterStats, $newStat);
		}

		return $characterStats;
	}
}