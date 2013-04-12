<?php

include_once("../Server/ServerManager.php");

class SessionManager
{ 

	private $_serverManager;

	public function  __construct() 
	{
		$this->_serverManager = new ServerManager();
	}

	public function InSession()
	{
		$this->ContinueSession();
		$this->_serverManager->LoadServerSettings();
	}

	public function NotInSession()
	{
		$this->_serverManager->LoadServerSettings();
	}

	public function CreateNewSession($userName)
	{
		session_start();
        $_SESSION['user_name'] = $userName;

        header("Location: ../Account/Edit-Profile.php");
        //header("Location: ../Character/Select.php");
	}

	public function ContinueSession()
	{
		session_start();
	}

	public function DestorySession()
	{
		session_unset();
		session_destroy();
		header("Location: ../index.html");
	}
}