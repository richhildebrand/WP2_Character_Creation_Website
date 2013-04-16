<?php
include_once("../Factories/DbConnectionFactory.php");

class ClassRepository
{
    private $_dbConnection;

    public function __construct()
    {
        $dbFactory = new DbConnectionFactory();
        $this->_dbConnection = $dbFactory->CreateDbConnection();
    }

    public function GetAllClasses()
    {
        $preparedStatement = $this->_dbConnection->prepare('SELECT * FROM classes');
        $preparedStatement->execute();
        
        return $preparedStatement->fetchAll();
    }
}