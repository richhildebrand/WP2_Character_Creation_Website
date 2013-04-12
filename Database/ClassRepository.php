<?php
require_once("Database.php");

class ClassRepository
{
    private $_dbConnection;

    public function __construct()
    {
        $this->_dbConnection = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $this->_dbConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->_dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function GetAllClasses()
    {
        $preparedStatement = $this->_dbConnection->prepare('SELECT * FROM classes');
        $preparedStatement->execute();
        
        return $preparedStatement->fetchAll();
    }
}