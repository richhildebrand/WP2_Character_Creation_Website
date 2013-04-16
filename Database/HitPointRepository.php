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

    public function GetCharacterHitPoints($character_id)
    {
        $preparedStatement = $this->_dbConnection->prepare('SELECT * FROM characters_hp WHERE character_id = :character_id');
        $preparedStatement->execute(array(':character_id' => $character_id));
        
        $preparedStatement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "HitPoints");

        return $preparedStatement->fetch();
    }
}