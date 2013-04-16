<?php
include_once("../Models/CharacterClass.php");
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
        
        return $preparedStatement->fetchAll(PDO::FETCH_CLASS, "CharacterClass");
    }

    public function GetClass($class)
    {
        $preparedStatement = $this->_dbConnection->prepare('SELECT * FROM classes WHERE class = :class');
        $preparedStatement->execute(array(':class' => $class));
        
        $preparedStatement->setFetchMode(PDO::FETCH_CLASS, "CharacterClass");

        return $preparedStatement->fetch();
    }
}