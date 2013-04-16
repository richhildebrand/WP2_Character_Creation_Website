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
			$statName =$stat['stat'];
			$characterStats[$statName] = 3; // should probably be random
		}

		return $characterStats;
	}
}