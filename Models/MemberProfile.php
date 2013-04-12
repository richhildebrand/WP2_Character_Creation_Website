<?php

class UserProfile
{

	private $_lastname;
	private $_firstname;
	private $_email;

	public function __construct($userProfile) 
	{
		$this->_lastname = $userProfile['lastname'];
		$this->_firstname = $userProfile['firstname'];
		$this->_email = $userProfile['email'];
	}

	public function GetLastName() {
		return $this->_lastname;
	}

	public function GetFirstName() {
		return $this->_firstname;
	}

	public function GetEmail() {
		return $this->_email;
	}
}