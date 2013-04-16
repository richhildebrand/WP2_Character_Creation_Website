<?php
include_once("../Factories/DbConnectionFactory.php");
include_once("../Models/StatDefinition.php");
include_once("../Models/Stat.php");
include_once("../Models/StatDefinition.php");

class StatRepository
{
    private $_dbConnection;

    public function __construct()
    {
        $dbFactory = new DbConnectionFactory();
        $this->_dbConnection = $dbFactory->CreateDbConnection();
    }

    public function GetAllStats()
    {
        $preparedStatement = $this->_dbConnection->prepare('SELECT * FROM stats_definitions');
        $preparedStatement->execute();
        
        return $preparedStatement->fetchAll(PDO::FETCH_CLASS, 'StatDefinition');
    }

    public function GetCharacterStats($characterId)
    {
        $preparedStatement = $this->_dbConnection->prepare("SELECT * FROM characters_stats WHERE character_id = :characterId");
        $preparedStatement->execute(array(':characterId' => $characterId));

        return $preparedStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Stat");
    }

    public function SaveCharacterStats($characterId, $characterStats)
    {
       
        foreach ($characterStats as $stat)
        {
            
            $this->InsertCharacterRow($characterId, $stat);
        }
    }

    private function InsertCharacterRow($id, $stat)
    {
        $preparedStatement = $this->_dbConnection->prepare('INSERT INTO characters_stats(character_id, stat, value)
                                                            VALUES(:id, :stat, :value)');
        $preparedStatement->execute(array(':id' => $id, ':stat' => $stat->GetStat(), ':value' => $stat->GetValue()));
    }
}
