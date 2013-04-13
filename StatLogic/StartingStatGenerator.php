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
		$stats = $this->_statRepository->GetAllStatTypes();
		$characterStats = array();

		foreach ($stats as $stat)
		{
			$characterStats[$stat] = 3; // should probably be random
		}

		return $characterStats;
	}
}