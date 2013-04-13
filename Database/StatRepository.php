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
    	$preparedStatement = $this->_dbConnection->prepare("DESCRIBE stats");
		$preparedStatement->execute();

        $columns = $preparedStatement->fetchAll(PDO::FETCH_COLUMN);

        return $this->ExcludeCharacterId($columns);
    }

    public function GetCharacterStats($characterId)
    {
        $preparedStatement = $this->_dbConnection->prepare("SELECT * FROM stats WHERE character_id = :characterId");
        $preparedStatement->execute(array(':characterId' => $characterId));

        //not sure why I am getting duplicates, but they need to be filtered
        $nestedStats = $preparedStatement->fetchAll();
        
        $stats = array();
        foreach ($nestedStats as $statsWithDuplicates) 
        {
            foreach ($statsWithDuplicates as $stat => $value)
            {
                if (!is_numeric($stat) && $stat != 'character_id')
                {
                    $stats[$stat] = $value;
                }
            }
        }       

        return $stats;
        //return $this->ExcludeCharacterId($columns);
    }

    public function SaveCharacterStats($characterId, $characterStats)
    {
        $this->InsertCharacterRow($characterId);
        foreach ($characterStats as $statName => $statValue)
        {
            
            $this->UpdateCharacterStat($characterId, $statName, $statValue);
        }
    }

    public function UpdateCharacterStat($characterId, $statName, $statValue)
    {
            $preparedStatement = $this->_dbConnection->prepare('UPDATE stats 
                                                                SET ' . $statName . ' = :statValue 
                                                                WHERE character_id = :id');
            $preparedStatement->execute(array(':id' => $characterId,':statValue' => $statValue));
    }

    private function InsertCharacterRow($id)
    {
        $preparedStatement = $this->_dbConnection->prepare('INSERT INTO stats(character_id)
                                                            VALUES(:id)');
        $preparedStatement->execute(array(':id' => $id));
    }

    private function ExcludeCharacterId($columns)
    {
        $stats = array();
        foreach ($columns as $column)
        {
            if ($column != 'character_id') 
            {
                array_push($stats, $column);
            }
        }
        return $stats;
    }
}
