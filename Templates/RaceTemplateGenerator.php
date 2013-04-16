<?php
include_once("../Templates/ListItemTemplateGenerator.php");
include_once("../Database/RaceRepository.php");

class RaceTemplateGenerator
{
	private $_raceRepository;
	private $_listItemTemplateGenerator;

	public function __construct()
	{
		$this->_raceRepository = new RaceRepository();
		$this->_listItemTemplateGenerator = new ListItemTemplateGenerator();
	}

	public function ListRaces()
	{
		$races = $this->_raceRepository->GetAllRaces();
		foreach ($races as $race)
		{
			echo $this->_listItemTemplateGenerator->RadioTemplate('Races', $race['race'],
																  $race['race'], '');	
		}
		
	}
}