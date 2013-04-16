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
        $preparedStatement = $this->_dbConnection->prepare('SELECT race FROM races');
        $preparedStatement->execute();
        
        return $preparedStatement->fetchAll();
    }

    public function GetCharacterStats($characterId)
    {
        $preparedStatement = $this->_dbConnection->prepare("SELECT * FROM characters_stats WHERE character_id = :characterId");
        $preparedStatement->execute(array(':characterId' => $characterId));

        return $preparedStatement->fetchAll();
    }

    public function SaveCharacterStats($characterId, $characterStats)
    {
       
        foreach ($characterStats as $statName => $statValue)
        {
            
            $this->InsertCharacterRow($characterId, $statName, $statValue);
        }
    }

    private function InsertCharacterRow($id, $stat, $value)
    {
        $preparedStatement = $this->_dbConnection->prepare('INSERT INTO characters_stats(character_id, stat, value)
                                                            VALUES(:id, :stat, :value)');
        $preparedStatement->execute(array(':id' => $id, ':stat' => $stat, ':value' => $value));
    }
}
