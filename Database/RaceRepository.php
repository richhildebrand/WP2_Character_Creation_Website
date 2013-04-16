<?php
include_once("../Factories/DbConnectionFactory.php");

class RaceRepository
{
    private $_dbConnection;

    public function __construct()
    {
        $dbFactory = new DbConnectionFactory();
        $this->_dbConnection = $dbFactory->CreateDbConnection();
    }

    public function GetAllRaces()
    {
        $preparedStatement = $this->_dbConnection->prepare('SELECT * FROM races');
        $preparedStatement->execute();
        
        return $preparedStatement->fetchAll();
    }
}