<?php
require_once('../Database/Database.php');

class StatRepository
{
    private $_dbConnection;

    public function __construct()
    {
        $this->_dbConnection = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $this->_dbConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->_dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function GetAllStatTypes()
    {
    	$preparedStatement = $_dbConnection->prepare("DESCRIBE stats");
		$preparedStatement->execute();

		return $preparedStatement->fetchAll(PDO::FETCH_COLUMN);
    }