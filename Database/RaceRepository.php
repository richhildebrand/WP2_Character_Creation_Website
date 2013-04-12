<?php
require_once("Database.php");

class RaceRepository
{
    private $_dbConnection;

    public function __construct()
    {
        $this->_dbConnection = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $this->_dbConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->_dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function GetAllRaces()
    {
        $preparedStatement = $this->_dbConnection->prepare('SELECT * FROM races');
        $preparedStatement->execute();
        
        return $preparedStatement->fetchAll();
    }
}