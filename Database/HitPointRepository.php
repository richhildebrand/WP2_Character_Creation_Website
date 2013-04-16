<?php
include_once('../Models/HitPoints.php');
include_once('../Factories/DbConnectionFactory.php');

class HitPointRepository
{
    private $_dbConnection;

    public function __construct()
    {
        $dbFactory = new DbConnectionFactory();
        $this->_dbConnection = $dbFactory->CreateDbConnection();
    }

    public function SaveCharacterHitPoints($character_id, $characterHitPoints)
    {
        $preparedStatement = $this->_dbConnection->prepare('INSERT INTO characters_hp(character_id, max_hp, current_hp)
                                                    		VALUES(:id, :max, :current)');
        $preparedStatement->execute(array(':id' => $character_id,
        								  ':max' => $characterHitPoints->GetMaxHitPoints(),
    								  	  ':current' => $characterHitPoints->GetCurrentHitPoints()));
    }
}