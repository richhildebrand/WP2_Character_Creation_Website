<?php
include_once("../Templates/ListItemTemplateGenerator.php");
include_once("../Database/ClassRepository.php");

class ClassTemplateGenerator
{
	private $_classRepository;
	private $_listItemTemplateGenerator;

	public function __construct()
	{
		$this->_classRepository = new ClassRepository();
		$this->_listItemTemplateGenerator = new ListItemTemplateGenerator();
	}

	public function ListClasses()
	{
		$classes = $this->_classRepository->GetAllClasses();
		foreach ($classes as $class)
		{
			echo $this->_listItemTemplateGenerator->RadioTemplate('Classes', $class['class'],
																  $class['class'], $class['url'], '');	
		}
		
	}
}