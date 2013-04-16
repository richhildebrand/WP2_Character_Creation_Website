<?php
include_once('../Models/CharacterHitPoints.php');
include_once('../Factories/DbConnectionFactory.php');

class CharacterHitPointRepository
{
    private $_dbConnection;

    public function __construct()
    {
        $dbFactory = new DbConnectionFactory();
        $this->_dbConnection = $dbFactory->CreateDbConnection();
    }

    public function SaveCharacterHitPoints()
    {

    }