<?php
include_once('../Models/Character.php');
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

    public function CreateNewCharacter($email, $name, $level, $class, $race, $alignment)
    {
        // xp is probably calculated from level
    	$xp = 0;


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
        								  ':name' => $name,
        								  ':class' => $class,
        								  ':race' => $race,
        								  ':alignment' => $alignment,
        								  ':level' => $level,
        								  ':xp' => $xp));
        
        return $this->_dbConnection->lastInsertId();
    }
}
