<?php
include_once('../Models/Character.php');
include_once('../Models/CharacterPreStatsDto');
include_once('../Factories/CharacterFactory.php');
include_once('../Factories/DbConnectionFactory.php');

class CharacterRepository
{
    private $_dbConnection;

    public function __construct()
    {
        $dbFactory = new DbConnectionFactory();
        $this->_dbConnection = $dbFactory->CreateDbConnection();
    }

    public function GetMemberCharacters($email)
    {
        $preparedStatement = $this->_dbConnection->prepare('SELECT * FROM characters WHERE email = :email');
        $preparedStatement->execute(array(':email' => $email));
        
        return $preparedStatement->fetchAll();
    }

    public function GetCharacter($id)
    {
        $preparedStatement = $this->_dbConnection->prepare('SELECT * FROM characters WHERE id = :id');
        $preparedStatement->execute(array(':id' => $id));
        
        $preparedStatement->setFetchMode(PDO::FETCH_CLASS, "Character");

        return $preparedStatement->fetch();
    }

    public function CreateNewCharacter($email, $characterPreStatsDto)
    {
        $preparedStatement = $this->_dbConnection->prepare('INSERT INTO characters(email, 
        																		   name,
    																		   	   class,
    																		   	   race,
    																		   	   alignment,
    																		   	   level,
    																		   	   xp)
                                                     		VALUES(:email,
                                                     		 	   :name,
                                                     		 	   :class,
                                                     		 	   :race,
                                                     		 	   :alignment,
                                                     		 	   :level,
                                                     		 	   :xp)');
        $preparedStatement->execute(array(':email' => $email,
        								  ':name' => $characterPreStatsDto->GetName(),
        								  ':class' => $characterPreStatsDto->GetClass(),
        								  ':race' => $characterPreStatsDto->GetRace(),
        								  ':alignment' => $characterPreStatsDto->GetAlignment(),
        								  ':level' => $characterPreStatsDto->GetLevel(),
        								  ':xp' => $characterPreStatsDto->GetXp()));
        
        return $this->_dbConnection->lastInsertId();
    }
}
